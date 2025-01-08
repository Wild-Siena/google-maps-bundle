<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Tests;

use WildSiena\GoogleMapsBundle\Enum\ColorSchemeType;
use WildSiena\GoogleMapsBundle\Enum\GestureType;
use WildSiena\GoogleMapsBundle\Enum\MapType;
use WildSiena\GoogleMapsBundle\Model\GoogleMap;
use WildSiena\GoogleMapsBundle\Model\LatLng;
use WildSiena\GoogleMapsBundle\Model\LoaderOptions;
use WildSiena\GoogleMapsBundle\Model\MapOptions;
use WildSiena\GoogleMapsBundle\Model\Marker;
use WildSiena\GoogleMapsBundle\Model\PinElement;

class GoogleMapFactory
{

    static function createLoaderOptions(): LoaderOptions
    {
        return new LoaderOptions(apiKey: "api_key_123456", version: "weekly");
    }

    static function createLatLng(): LatLng
    {
        return new LatLng(lat: -43.00, lng: 29.20);
    }

    /**
     * @return Marker[]
     */
    static function createMarkers(): array
    {
        return [new Marker(self::createLatLng())];
    }

    /**
     * @return Marker[]
     */
    static function createMarkersWithPinElement(): array
    {
        $pin = (new PinElement())->setGlyph("A")->setGlyphColor("#fff");
        $marker = (new Marker(self::createLatLng()))->setContent($pin);
        return [$marker];
    }

    static function createMapOptions(): MapOptions
    {
        return new MapOptions(center: self::createLatLng(), zoom: 7);
    }

    /**
     * @param Marker[]|null $markers
     */
    static function createGoogleMap(MapOptions $mapOptions, ?array $markers): GoogleMap
    {
        $googleMap = new GoogleMap();
        $googleMap->setLoaderOptions(self::createLoaderOptions())
            ->setMapOptions($mapOptions);

        if (null !== $markers) {
            $googleMap->setMarkers($markers);
        }

        return $googleMap;
    }

    public static function getGoogleMap(): GoogleMap
    {
        return self::createGoogleMap(self::createMapOptions(), null);
    }

    public static function getGoogleMapWithMarkers(): GoogleMap
    {
        return self::createGoogleMap(
            self::createMapOptions(),
            self::createMarkers()
        );
    }

    public static function getGoogleMapWithDisabledDefaultUi(): GoogleMap
    {
        return self::createGoogleMap(
            self::createMapOptions()
                ->setDisableDefaultUI(true),
            null
        );
    }

    public static function getGoogleMapWithActivatedControls(): GoogleMap
    {
        return self::createGoogleMap(
            self::createMapOptions()
                ->setDisableDefaultUI(true)
                ->setZoomControl(true)
                ->setFullscreenControl(true)
                ->setRotateControl(true)
                ->setScaleControl(true)
                ->setStreetViewControl(true)
                ->setMapTypeControl(true),
            null
        );
    }

    public static function getGoogleMapWithMapTypeIdSatellite(): GoogleMap
    {
        return self::createGoogleMap(
            self::createMapOptions()
                ->setMapTypeId(MapType::SATELLITE),
            null
        );
    }

    public static function getGoogleMapWithGestureHandlingCooperative(): GoogleMap
    {
        return self::createGoogleMap(
            self::createMapOptions()
                ->setGestureHandling(GestureType::COOPERATIVE),
            null
        );
    }

    public static function getGoogleMapWithColorSchemeDark(): GoogleMap
    {
        return self::createGoogleMap(
            self::createMapOptions()
                ->setColorScheme(ColorSchemeType::DARK),
            null
        );
    }

    public static function getGoogleMapWithPinElementInMarker(): GoogleMap
    {
        return self::createGoogleMap(
            self::createMapOptions(),
            self::createMarkersWithPinElement()
        );
    }

}