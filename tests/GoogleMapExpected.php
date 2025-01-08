<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Tests;

class GoogleMapExpected
{
    const DOUBLE_QUOT = '&quot;';

    private static function getValue(string $value): string
    {
        return str_replace(
            ['"'],
            [self::DOUBLE_QUOT],
            $value
        );
    }

    private static function getAttr(
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

    private static function getLoaderOptionsValue(): string
    {
        return self::getValue('{"apiKey":"api_key_123456","version":"weekly"}');
    }

    private static function getMapOptionsValue(): string
    {
        return self::getValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7}');
    }

    private static function getMarkersValue(): string
    {
        return self::getValue('[{"position":{"lat":-43.0,"lng":29.2}}]');
    }

    private static function getMapOptionsValueWithDisableDefaultUI(): string
    {
        return self::getValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7,"disableDefaultUI":true}');
    }

    private static function getMapOptionsValueWithDisableDefaultUIAndActiveControls(): string
    {
        return self::getValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7,"disableDefaultUI":true,"zoomControl":true,"mapTypeControl":true,"scaleControl":true,"streetViewControl":true,"rotateControl":true,"fullscreenControl":true}');
    }

    private static function getMapOptionsWithMapTypeIdSatellite(): string
    {
        return self::getValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7,"mapTypeId":"satellite"}');
    }

    private static function getMapOptionsValueWithGestureHandlingCooperative(): string
    {
        return self::getValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7,"gestureHandling":"cooperative"}');
    }

    private static function getMapOptionsValueWithColorSchemeDark(): string
    {
        return self::getValue('{"center":{"lat":-43.0,"lng":29.2},"zoom":7,"colorScheme":"DARK"}');
    }

    private static function getMarkersValueWithPinElement(): string
    {
        return self::getValue('[{"position":{"lat":-43.0,"lng":29.2},"content":{"glyphColor":"#fff","glyph":"A"}}]');
    }

    public static function getGoogleMapAttrExpected(): string
    {
        return self::getAttr(
            self::getLoaderOptionsValue(),
            self::getMapOptionsValue()
        );
    }

    public static function getGoogleMapAttrWithClassHfullExpected(): string
    {
        return self::getAttr(
            self::getLoaderOptionsValue(),
            self::getMapOptionsValue(),
            "class=\"h-full\""
        );
    }

    public static function getGoogleMapAttrWithMarkersExpected(): string
    {
        return self::getAttr(
            self::getLoaderOptionsValue(),
            self::getMapOptionsValue(),
            expectedMarkersValue: self::getMarkersValue()
        );
    }

    public static function getGoogleMapAttrWithDisabledDefaultUI(): string
    {
        return self::getAttr(
            self::getLoaderOptionsValue(),
            self::getMapOptionsValueWithDisableDefaultUI()
        );
    }

    public static function getGoogleMapAttrWithDisableDefaultUIAndActiveControls(): string
    {
        return self::getAttr(
            self::getLoaderOptionsValue(),
            self::getMapOptionsValueWithDisableDefaultUIAndActiveControls()
        );
    }

    public static function getGoogleMapAttrWithMapTypeIdSatellite(): string
    {
        return self::getAttr(
            self::getLoaderOptionsValue(),
            self::getMapOptionsWithMapTypeIdSatellite()
        );
    }

    public static function getGoogleMapAttrWithGestureHandlingCooperative(): string
    {
        return self::getAttr(
            self::getLoaderOptionsValue(),
            self::getMapOptionsValueWithGestureHandlingCooperative()
        );
    }

    public static function getGoogleMapAttrWithColorSchemeDark(): string
    {
        return self::getAttr(
            self::getLoaderOptionsValue(),
            self::getMapOptionsValueWithColorSchemeDark()
        );
    }

    public static function getGoogleMapAttrWithPinElementInMarker(): string
    {
        return self::getAttr(
            self::getLoaderOptionsValue(),
            self::getMapOptionsValue(),
            expectedMarkersValue: self::getMarkersValueWithPinElement()
        );
    }
}