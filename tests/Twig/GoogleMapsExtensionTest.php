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
use WildSiena\GoogleMapsBundle\Twig\GoogleMapsExtension;
use WildSiena\GoogleMapsBundle\Tests\GoogleMapFactory;

class GoogleMapsExtensionTest extends TestCase
{
    const CURLY_BRACKET_OPEN = '&#x7B;';
    const CURLY_BRACKET_CLOSE = '&#x7D;';
    const SQUARE_BRACKET_OPEN = '&#x5B;';
    const SQUARE_BRACKET_CLOSE = '&#x5D;';
    const COLON = '&#x3A;';
    const DOUBLE_QUOT = '&quot;';
    private GoogleMapsExtension $googleMapsExtension;

    private static function toDataValue(string $value): string
    {
        return str_replace(
            ['{','}','[',']',':','"'],
            [self::CURLY_BRACKET_OPEN, self::CURLY_BRACKET_CLOSE, self::SQUARE_BRACKET_OPEN, self::SQUARE_BRACKET_CLOSE, self::COLON, self::DOUBLE_QUOT],
            $value
        );
    }

    /**
     * @return array<string, array<mixed>>
     */
    public static function renderGoogleMapsDataProvider(): array
    {
        $expectedLoaderOptionsValue = self::toDataValue('{"apiKey":"api_123456","version":"weekly"}');
        $expectedMapOptionsValue = self::toDataValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7}');
        $expectedMarkersValue = self::toDataValue('[{"position":{"lat":-43.12,"lng":29.22}}]');
        $expected = "data-controller=\"wild-siena--google-maps-bundle--google-maps\" ";
        $expected .= "data-wild-siena--google-maps-bundle--google-maps-loader-options-value=\"$expectedLoaderOptionsValue\" ";
        $expected .= "data-wild-siena--google-maps-bundle--google-maps-map-options-value=\"$expectedMapOptionsValue\"";

        $expectedWithClassAttr = "data-controller=\"wild-siena--google-maps-bundle--google-maps\" class=\"h-full\" ";
        $expectedWithClassAttr .= "data-wild-siena--google-maps-bundle--google-maps-loader-options-value=\"$expectedLoaderOptionsValue\" ";
        $expectedWithClassAttr .= "data-wild-siena--google-maps-bundle--google-maps-map-options-value=\"$expectedMapOptionsValue\"";

        $expectedWithMarkers = "data-controller=\"wild-siena--google-maps-bundle--google-maps\" ";
        $expectedWithMarkers .= "data-wild-siena--google-maps-bundle--google-maps-loader-options-value=\"$expectedLoaderOptionsValue\" ";
        $expectedWithMarkers .= "data-wild-siena--google-maps-bundle--google-maps-map-options-value=\"$expectedMapOptionsValue\" ";
        $expectedWithMarkers .= "data-wild-siena--google-maps-bundle--google-maps-markers-value=\"$expectedMarkersValue\"";

        return [
            'no attributes' => [GoogleMapFactory::createGoogleMapBasic(), [], $expected],
            'class attribute' => [GoogleMapFactory::createGoogleMapBasic(), ['class' => 'h-full'], $expectedWithClassAttr],
            'markers' => [GoogleMapFactory::createGoogleMapWithMarkers(), [], $expectedWithMarkers],
        ];
    }

    /**
     * @return array<string, array<mixed>>
     */
    public static function getGoogleMapsAttributesDataProvider(): array
    {
        $expectedLoaderOptionsValue = self::toDataValue('{"apiKey":"api_123456","version":"weekly"}');
        $expectedMapOptionsValue = self::toDataValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7}');
        $expectedMarkersValue = self::toDataValue('[{"position":{"lat":-43.12,"lng":29.22}}]');

        $expected = "data-controller=\"wild-siena--google-maps-bundle--google-maps\" ";
        $expected .= "data-wild-siena--google-maps-bundle--google-maps-loader-options-value=\"$expectedLoaderOptionsValue\" ";
        $expected .= "data-wild-siena--google-maps-bundle--google-maps-map-options-value=\"$expectedMapOptionsValue\"";

        $expectedWithMarkers = "data-controller=\"wild-siena--google-maps-bundle--google-maps\" ";
        $expectedWithMarkers .= "data-wild-siena--google-maps-bundle--google-maps-loader-options-value=\"$expectedLoaderOptionsValue\" ";
        $expectedWithMarkers .= "data-wild-siena--google-maps-bundle--google-maps-map-options-value=\"$expectedMapOptionsValue\" ";
        $expectedWithMarkers .= "data-wild-siena--google-maps-bundle--google-maps-markers-value=\"$expectedMarkersValue\"";

        return [
            'no markers' => [GoogleMapFactory::createGoogleMapBasic(), $expected],
            'markers' => [GoogleMapFactory::createGoogleMapWithMarkers(), $expectedWithMarkers],
        ];
    }

    protected function setUp(): void
    {
        // Dependencies
        $stimulusHelper = new StimulusHelper(null);
        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncode()]);

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