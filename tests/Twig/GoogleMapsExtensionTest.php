<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Tests\Twig;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\UX\StimulusBundle\Helper\StimulusHelper;
use WildSiena\GoogleMapsBundle\Enum\MapType;
use WildSiena\GoogleMapsBundle\Model\GoogleMap;
use WildSiena\GoogleMapsBundle\Tests\GoogleMapExpected;
use WildSiena\GoogleMapsBundle\Twig\GoogleMapsExtension;
use WildSiena\GoogleMapsBundle\Tests\GoogleMapFactory;

class GoogleMapsExtensionTest extends TestCase
{

    protected GoogleMapsExtension $googleMapsExtension;

    /**
     * @return array<string, array<mixed>>
     */
    public static function renderGoogleMapsDataProvider(): array
    {
        return [
            'no attributes' => [GoogleMapFactory::createGoogleMapBasic(), [], GoogleMapExpected::getDefaultExpected()],
            'class attribute' => [GoogleMapFactory::createGoogleMapBasic(), ['class' => 'h-full'], GoogleMapExpected::getExpectedWithAttr()],
            'markers' => [GoogleMapFactory::createGoogleMapWithMarkers(), [], GoogleMapExpected::getExpectedWithMarkers()],
            'disabled default ui' => [GoogleMapFactory::createGoogleMapWithDisabledDefaultUi(), [], GoogleMapExpected::getExpectedWithDisabledefaultUI()],
            'disabled default ui activated controls' => [GoogleMapFactory::createGoogleMapWithActivatedControls(), [], GoogleMapExpected::getExpectedWithDisabledefaultUIAndActiveControls()],
            'mapTypeId set to satellite' => [GoogleMapFactory::createGoogleMapWithMapTypeIdSatellite(), [], GoogleMapExpected::getExpectedWithMapTypeIdSatellite()]
        ];
    }

    /**
     * @return array<string, array<mixed>>
     */
    public static function getGoogleMapsAttributesDataProvider(): array
    {
        return [
            'no markers' => [GoogleMapFactory::createGoogleMapBasic(), GoogleMapExpected::getDefaultExpected()],
            'markers' => [GoogleMapFactory::createGoogleMapWithMarkers(), GoogleMapExpected::getExpectedWithMarkers()],
            'disabled default ui' => [GoogleMapFactory::createGoogleMapWithDisabledDefaultUi(), GoogleMapExpected::getExpectedWithDisabledefaultUI()],
            'disabled default ui activated controls' => [GoogleMapFactory::createGoogleMapWithActivatedControls(), GoogleMapExpected::getExpectedWithDisabledefaultUIAndActiveControls()],
            'mapTypeId set to satellite' => [GoogleMapFactory::createGoogleMapWithMapTypeIdSatellite(), GoogleMapExpected::getExpectedWithMapTypeIdSatellite()]
        ];
    }

    protected function setUp(): void
    {
        // Dependencies
        $stimulusHelper = new StimulusHelper(null);
        $serializer = new Serializer([new BackedEnumNormalizer(), new ObjectNormalizer()], [new JsonEncode()]);

        $this->googleMapsExtension = new GoogleMapsExtension($stimulusHelper, $serializer);
    }

    /**
     * @param GoogleMap $googleMap
     * @param string $expected
     * @return void
     */
    #[DataProvider('getGoogleMapsAttributesDataProvider')]
    public function testGetGoogleMapsAttributes(GoogleMap $googleMap, string $expected): void
    {

        $result = $this->googleMapsExtension->getGoogleMapsAttributes($googleMap);
        $this->assertStringContainsString('wild-siena--google-maps-bundle--google-maps', $result);
        $this->assertEquals($expected, $result);
    }

    /**
     * @param GoogleMap $googleMap
     * @param array<string, string> $attributes
     * @param string $expected
     * @return void
     */
    #[DataProvider('renderGoogleMapsDataProvider')]
    public function testRenderGoogleMaps(GoogleMap $googleMap, array $attributes, string $expected): void
    {
        $result = $this->googleMapsExtension->renderGoogleMaps($googleMap, $attributes);
        $this->assertStringContainsString('wild-siena--google-maps-bundle--google-maps', $result);
        $this->assertEquals("<div " . $expected . "></div>", $result);
    }

    protected function tearDown(): void
    {
        unset($this->googleMapsExtension);
    }
}