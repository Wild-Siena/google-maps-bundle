<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Tests;

use WildSiena\GoogleMapsBundle\Model\GoogleMap;

class GoogleMapExpected
{
    const CURLY_BRACKET_OPEN = '&#x7B;';
    const CURLY_BRACKET_CLOSE = '&#x7D;';
    const SQUARE_BRACKET_OPEN = '&#x5B;';
    const SQUARE_BRACKET_CLOSE = '&#x5D;';
    const COLON = '&#x3A;';
    const DOUBLE_QUOT = '&quot;';

    private static function replace(string $value): string
    {
        return str_replace(
            ['{', '}', '[', ']', ':', '"'],
            [self::CURLY_BRACKET_OPEN, self::CURLY_BRACKET_CLOSE, self::SQUARE_BRACKET_OPEN, self::SQUARE_BRACKET_CLOSE, self::COLON, self::DOUBLE_QUOT],
            $value
        );
    }

    /**
     * @param GoogleMap $googleMap
     * @param string $attrs
     * @return string
     */
    public static function getAttr(
        GoogleMap $googleMap,
        string    $attrs = "",
    ): string
    {
        $loaderOptions = self::replace(\json_encode($googleMap->getLoaderOptions()) ?: "");
        $mapOptions = self::replace(\json_encode($googleMap->getMapOptions()) ?: "");
        $markers = self::replace($googleMap->getMarkers() !== null ? \json_encode($googleMap->getMarkers()) ?: "" : "");

        $formatedAttrs = empty($attrs) ? "" : $attrs . " ";
        $expected = "data-controller=\"wild-siena--google-maps-bundle--google-maps\" $formatedAttrs";
        $expected .= "data-wild-siena--google-maps-bundle--google-maps-loader-options-value=\"$loaderOptions\" ";
        $expected .= "data-wild-siena--google-maps-bundle--google-maps-map-options-value=\"$mapOptions\"";
        if (!empty($markers)) {
            $expected .= " data-wild-siena--google-maps-bundle--google-maps-markers-value=\"$markers\"";
        }

        return $expected;
    }
}