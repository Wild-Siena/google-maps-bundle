<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Tests;

class GoogleMapExpected
{
    const CURLY_BRACKET_OPEN = '&#x7B;';
    const CURLY_BRACKET_CLOSE = '&#x7D;';
    const SQUARE_BRACKET_OPEN = '&#x5B;';
    const SQUARE_BRACKET_CLOSE = '&#x5D;';
    const COLON = '&#x3A;';
    const DOUBLE_QUOT = '&quot;';

    private static function toDataValue(string $value): string
    {
        return str_replace(
            ['{', '}', '[', ']', ':', '"'],
            [self::CURLY_BRACKET_OPEN, self::CURLY_BRACKET_CLOSE, self::SQUARE_BRACKET_OPEN, self::SQUARE_BRACKET_CLOSE, self::COLON, self::DOUBLE_QUOT],
            $value
        );
    }

    public static function getValue(string $value): string
    {
        return self::toDataValue($value);
    }

    public static function getAttr(
        string $expectedLoaderOptionsValue,
        string $expectedMapOptionsValue,
        string $attrs = "",
        string $expectedMarkersValue = null
    ): string
    {
        $formatedAttrs = empty($attrs) ? "" : $attrs . " ";
        $expected = "data-controller=\"wild-siena--google-maps-bundle--google-maps\" $formatedAttrs";
        $expected .= "data-wild-siena--google-maps-bundle--google-maps-loader-options-value=\"$expectedLoaderOptionsValue\" ";
        $expected .= "data-wild-siena--google-maps-bundle--google-maps-map-options-value=\"$expectedMapOptionsValue\"";
        if ($expectedMarkersValue !== null) {
            $expected .= " data-wild-siena--google-maps-bundle--google-maps-markers-value=\"$expectedMarkersValue\"";
        }
        return $expected;
    }

    public static function getDefaultLoaderOptionsValue(): string
    {
        return self::getValue('{"apiKey":"api_123456","version":"weekly"}');
    }

    public static function getDefaultMapOptionsValue(): string
    {
        return self::getValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7}');
    }

    public static function getMapOptionsValueWithMapId(): string
    {
        return self::getValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7,"mapId":"DEMO_MAP_ID"}');
    }

    public static function getMapOptionsValueWithDisableDefaultUI(): string
    {
        return self::getValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7,"disableDefaultUI":true}');
    }

    public static function getMapOptionsValueWithDisableDefaultUIAndActiveControls(): string
    {
        return self::getValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7,"disableDefaultUI":true,"zoomControl":true,"mapTypeControl":true,"scaleControl":true,"streetViewControl":true,"rotateControl":true,"fullscreenControl":true}');
    }

    public static function getMapOptionsValueWithAllProperties(): string
    {
        return self::getValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7,"mapId":"DEMO_MAP_ID","disableDefaultUI":true}');
    }

    public static function getMarkersValue(): string
    {
        return self::getValue('[{"position":{"lat":-43.12,"lng":29.22}}]');
    }

    public static function getDefaultExpected(): string
    {
        return self::getAttr(self::getDefaultLoaderOptionsValue(), self::getDefaultMapOptionsValue());
    }

    public static function getExpectedWithAttr(): string
    {
        return self::getAttr(self::getDefaultLoaderOptionsValue(), self::getDefaultMapOptionsValue(), "class=\"h-full\"");
    }

    public static function getExpectedWithMarkers(): string
    {
        return self::getAttr(self::getDefaultLoaderOptionsValue(), self::getDefaultMapOptionsValue(), expectedMarkersValue: self::getMarkersValue());
    }

    public static function getExpectedWithDisabledefaultUI(): string
    {
        return self::getAttr(self::getDefaultLoaderOptionsValue(), self::getMapOptionsValueWithDisableDefaultUI());
    }

    public static function getExpectedWithDisabledefaultUIAndActiveControls(): string
    {
        return self::getAttr(self::getDefaultLoaderOptionsValue(), self::getMapOptionsValueWithDisableDefaultUIAndActiveControls());
    }
}