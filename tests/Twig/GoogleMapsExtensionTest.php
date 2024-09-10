<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Tests\Twig;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\UX\StimulusBundle\Helper\StimulusHelper;
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
            'no attributes' => [GoogleMapFactory::createGoogleMapBasic(), [], GoogleMapExpected::getAttr(GoogleMapFactory::createGoogleMapBasic())],
            'class attribute' => [GoogleMapFactory::createGoogleMapBasic(), ['class' => 'h-full'], GoogleMapExpected::getAttr(GoogleMapFactory::createGoogleMapBasic(), "class=\"h-full\"")],
            'markers' => [GoogleMapFactory::createGoogleMapWithMarkers(), [], GoogleMapExpected::getAttr(GoogleMapFactory::createGoogleMapWithMarkers())],
            'disabled default ui' => [GoogleMapFactory::createGoogleMapWithDisabledDefaultUi(), [], GoogleMapExpected::getAttr(GoogleMapFactory::createGoogleMapWithDisabledDefaultUi())],
            'disabled default ui activated controls' => [GoogleMapFactory::createGoogleMapWithActivatedControls(), [], GoogleMapExpected::getAttr(GoogleMapFactory::createGoogleMapWithActivatedControls())]
        ];
    }

    /**
     * @return array<string, array<mixed>>
     */
    public static function getGoogleMapsAttributesDataProvider(): array
    {
        return [
            'no markers' => [GoogleMapFactory::createGoogleMapBasic(), GoogleMapExpected::getAttr(GoogleMapFactory::createGoogleMapBasic())],
            'markers' => [GoogleMapFactory::createGoogleMapWithMarkers(), GoogleMapExpected::getAttr(GoogleMapFactory::createGoogleMapWithMarkers())],
            'disabled default ui' => [GoogleMapFactory::createGoogleMapWithDisabledDefaultUi(), GoogleMapExpected::getAttr(GoogleMapFactory::createGoogleMapWithDisabledDefaultUi())],
            'disabled default ui activated controls' => [GoogleMapFactory::createGoogleMapWithActivatedControls(), GoogleMapExpected::getAttr(GoogleMapFactory::createGoogleMapWithActivatedControls())]
        ];
    }

    protected function setUp(): void
    {
        // Dependencies
        $stimulusHelper = new StimulusHelper(null);
        $this->googleMapsExtension = new GoogleMapsExtension($stimulusHelper);
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