<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Tests\Twig;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\UX\StimulusBundle\Helper\StimulusHelper;
use WildSiena\GoogleMapsBundle\Model\GoogleMap;
use WildSiena\GoogleMapsBundle\Model\LoaderOptions;
use WildSiena\GoogleMapsBundle\Model\MapOptions;
use WildSiena\GoogleMapsBundle\Twig\GoogleMapsExtension;

class GoogleMapsExtensionTest extends TestCase
{
    private GoogleMapsExtension $googleMapsExtension;
    private GoogleMap $googleMap;
    private string $expect;

    protected function setUp(): void
    {
        $stimulusHelper = new StimulusHelper(null);
        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncode()]);
        $loaderOptions = new LoaderOptions();
        $loaderOptions->setApiKey('api_123456')->setVersion('weekly');
        $mapOptions = new MapOptions();
        $mapOptions->setCenter([-43.00, 29.20])->setZoom(7);
        $this->googleMapsExtension = new GoogleMapsExtension($stimulusHelper, $serializer);
        $this->googleMap = new GoogleMap();
        $this->googleMap
            ->setLoaderOptions($loaderOptions)
            ->setMapOptions($mapOptions);

        // Generate expected value
        $loaderOptionsJson = \str_replace(['{','}','[', ']',':'], ['&#x7B;','&#x7D;','&#x5B;','&#x5D;','&#x3A;'], \htmlspecialchars(
            $serializer->serialize($this->googleMap->getLoaderOptions(), 'json'),
            flags: \ENT_QUOTES | \ENT_SUBSTITUTE,
            encoding: 'UTF-8',
        ));
        $mapOptionsJson = \str_replace(['{','}','[', ']',':'], ['&#x7B;','&#x7D;','&#x5B;','&#x5D;','&#x3A;'], \htmlspecialchars(
            $serializer->serialize($this->googleMap->getMapOptions(), 'json'),
            flags: \ENT_QUOTES | \ENT_SUBSTITUTE,
            encoding: 'UTF-8',
        ));
        $dataController = "data-controller=\"wild-siena--google-maps--google-maps\"";
        $dataLoaderOptionsValue = "data-wild-siena--google-maps--google-maps-loader-options-value=\"$loaderOptionsJson\"";
        $dataMapOptionsValue = "data-wild-siena--google-maps--google-maps-map-options-value=\"$mapOptionsJson\"";
        $this->expect = $dataController . " " . $dataLoaderOptionsValue . " " . $dataMapOptionsValue;
    }

    public function testGetGoogleMapsAttributes(): void
    {

        $result = $this->googleMapsExtension->getGoogleMapsAttributes($this->googleMap);
        $this->assertEquals($this->expect, $result);
    }

    public function testRenderGoogleMaps(): void
    {
        $result = $this->googleMapsExtension->renderGoogleMaps($this->googleMap);
        $this->assertEquals("<div " . $this->expect . "></div>", $result);
    }

    protected function tearDown(): void
    {
        unset($this->googleMap);
        unset($this->googleMapsExtension);
        unset($this->expect);
    }
}