<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Tests\Twig;

use PHPUnit\Framework\Attributes\DataProvider;
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
    const CURLY_BRACKET_OPEN = '&#x7B;';
    const CURLY_BRACKET_CLOSE = '&#x7D;';
    const SQUARE_BRACKET_OPEN = '&#x5B;';
    const SQUARE_BRACKET_CLOSE = '&#x5D;';
    const COLON = '&#x3A;';
    const DOUBLE_QUOT = '&quot;';
    private GoogleMapsExtension $googleMapsExtension;
    private GoogleMap $googleMap;

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
        $expected = "data-controller=\"wild-siena--google-maps-bundle--google-maps\" ";
        $expected .= "data-wild-siena--google-maps-bundle--google-maps-loader-options-value=\"$expectedLoaderOptionsValue\" ";
        $expected .= "data-wild-siena--google-maps-bundle--google-maps-map-options-value=\"$expectedMapOptionsValue\"";

        $expectedWithClassAttr = "data-controller=\"wild-siena--google-maps-bundle--google-maps\" class=\"h-full\" ";
        $expectedWithClassAttr .= "data-wild-siena--google-maps-bundle--google-maps-loader-options-value=\"$expectedLoaderOptionsValue\" ";
        $expectedWithClassAttr .= "data-wild-siena--google-maps-bundle--google-maps-map-options-value=\"$expectedMapOptionsValue\"";
        return [
            'no attributes' => [[], $expected],
            'class attribute' => [['class' => 'h-full'], $expectedWithClassAttr]
        ];
    }

    protected function setUp(): void
    {
        // Dependencies
        $stimulusHelper = new StimulusHelper(null);
        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncode()]);

        // GoogleMaps data
        $loaderOptions = new LoaderOptions();
        $loaderOptions->setApiKey('api_123456')->setVersion('weekly');
        $mapOptions = new MapOptions();
        $mapOptions->setCenter(['lat' => -43.00, 'lng' => 29.20])->setZoom(7);
        $this->googleMapsExtension = new GoogleMapsExtension($stimulusHelper, $serializer);
        $this->googleMap = new GoogleMap();
        $this->googleMap
            ->setLoaderOptions($loaderOptions)
            ->setMapOptions($mapOptions);
    }

    public function testGetGoogleMapsAttributes(): void
    {
        $expectedLoaderOptionsValue = $this->toDataValue('{"apiKey":"api_123456","version":"weekly"}');
        $expectedMapOptionsValue = $this->toDataValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7}');
        $expected = "data-controller=\"wild-siena--google-maps-bundle--google-maps\" ";
        $expected .= "data-wild-siena--google-maps-bundle--google-maps-loader-options-value=\"$expectedLoaderOptionsValue\" ";
        $expected .= "data-wild-siena--google-maps-bundle--google-maps-map-options-value=\"$expectedMapOptionsValue\"";
        $result = $this->googleMapsExtension->getGoogleMapsAttributes($this->googleMap);
        $this->assertStringContainsString('wild-siena--google-maps-bundle--google-maps', $result);
        $this->assertEquals($expected, $result);
    }

    /**
     * @param array<string, string> $attributes
     * @param string $expected
     * @return void
     */
    #[DataProvider('renderGoogleMapsDataProvider')]
    public function testRenderGoogleMaps(array $attributes, string $expected): void
    {
        $result = $this->googleMapsExtension->renderGoogleMaps($this->googleMap, $attributes);
        $this->assertStringContainsString('wild-siena--google-maps-bundle--google-maps', $result);
        $this->assertEquals("<div " . $expected . "></div>", $result);
    }

    protected function tearDown(): void
    {
        unset($this->googleMap);
        unset($this->googleMapsExtension);
    }
}