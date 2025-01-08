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
use WildSiena\GoogleMapsBundle\Model\GoogleMap;
use WildSiena\GoogleMapsBundle\Tests\GoogleMapExpected;
use WildSiena\GoogleMapsBundle\Twig\GoogleMapsExtension;
use WildSiena\GoogleMapsBundle\Tests\GoogleMapFactory;

class GoogleMapsExtensionTest extends TestCase
{

    protected Serializer $serializer;
    protected GoogleMapsExtension $googleMapsExtension;

    /**
     * @return array<string, array<mixed>>
     */
    public static function renderGoogleMapsDataProvider(): array
    {
        return [
            'no attributes' => [
                GoogleMapFactory::getGoogleMap(),
                [],
                GoogleMapExpected::getGoogleMapAttrExpected()
            ],
            'class attribute' => [
                GoogleMapFactory::getGoogleMap(),
                ['class' => 'h-full'],
                GoogleMapExpected::getGoogleMapAttrWithClassHfullExpected()
            ],
            'markers' => [
                GoogleMapFactory::getGoogleMapWithMarkers(),
                [],
                GoogleMapExpected::getGoogleMapAttrWithMarkersExpected()
            ],
            'disabled default ui' => [
                GoogleMapFactory::getGoogleMapWithDisabledDefaultUi(),
                [],
                GoogleMapExpected::getGoogleMapAttrWithDisabledDefaultUI()
            ],
            'disabled default ui activated controls' => [
                GoogleMapFactory::getGoogleMapWithActivatedControls(),
                [],
                GoogleMapExpected::getGoogleMapAttrWithDisableDefaultUIAndActiveControls()
            ],
            'mapTypeId set to satellite' => [
                GoogleMapFactory::getGoogleMapWithMapTypeIdSatellite(),
                [],
                GoogleMapExpected::getGoogleMapAttrWithMapTypeIdSatellite()
            ],
            'gestureHandling set to cooperative' => [
                GoogleMapFactory::getGoogleMapWithGestureHandlingCooperative(),
                [],
                GoogleMapExpected::getGoogleMapAttrWithGestureHandlingCooperative()
            ],
            'color scheme set to dark' => [
                GoogleMapFactory::getGoogleMapWithColorSchemeDark(),
                [],
                GoogleMapExpected::getGoogleMapAttrWithColorSchemeDark()
            ],
            'set pin element to a marker' => [
                GoogleMapFactory::getGoogleMapWithPinElementInMarker(),
                [],
                GoogleMapExpected::getGoogleMapAttrWithPinElementInMarker()
            ]
        ];
    }

    /**
     * @return array<string, array<mixed>>
     */
    public static function getGoogleMapsAttributesDataProvider(): array
    {
        return [
            'no markers' => [
                GoogleMapFactory::getGoogleMap(),
                GoogleMapExpected::getGoogleMapAttrExpected()
            ],
            'markers' => [
                GoogleMapFactory::getGoogleMapWithMarkers(),
                GoogleMapExpected::getGoogleMapAttrWithMarkersExpected()
            ],
            'disabled default ui' => [
                GoogleMapFactory::getGoogleMapWithDisabledDefaultUi(),
                GoogleMapExpected::getGoogleMapAttrWithDisabledDefaultUI()
            ],
            'disabled default ui activated controls' => [
                GoogleMapFactory::getGoogleMapWithActivatedControls(),
                GoogleMapExpected::getGoogleMapAttrWithDisableDefaultUIAndActiveControls()
            ],
            'mapTypeId set to satellite' => [
                GoogleMapFactory::getGoogleMapWithMapTypeIdSatellite(),
                GoogleMapExpected::getGoogleMapAttrWithMapTypeIdSatellite()
            ],
            'gestureHandling set to cooperative' => [
                GoogleMapFactory::getGoogleMapWithGestureHandlingCooperative(),
                GoogleMapExpected::getGoogleMapAttrWithGestureHandlingCooperative()
            ],
            'color scheme set to dark' => [
                GoogleMapFactory::getGoogleMapWithColorSchemeDark(),
                GoogleMapExpected::getGoogleMapAttrWithColorSchemeDark()
            ],
            'set pin element to a marker' => [
                GoogleMapFactory::getGoogleMapWithPinElementInMarker(),
                GoogleMapExpected::getGoogleMapAttrWithPinElementInMarker()
            ]
        ];
    }

    protected function setUp(): void
    {
        // Dependencies
        $stimulusHelper = new StimulusHelper(null);
        $this->serializer = new Serializer([new BackedEnumNormalizer(), new ObjectNormalizer()], [new JsonEncode()]);

        $this->googleMapsExtension = new GoogleMapsExtension($stimulusHelper, $this->serializer);
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