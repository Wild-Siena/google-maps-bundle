<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Tests;

use WildSiena\GoogleMapsBundle\Model\GoogleMap;
use WildSiena\GoogleMapsBundle\Model\LatLng;
use WildSiena\GoogleMapsBundle\Model\LoaderOptions;
use WildSiena\GoogleMapsBundle\Model\MapOptions;
use WildSiena\GoogleMapsBundle\Model\Marker;

class GoogleMapFactory
{

    static function createLoaderOptions(string $apiKey = 'api_123456', string $version = 'weekly'): LoaderOptions
    {
        return new LoaderOptions(apiKey: $apiKey, version: $version);
    }

    static function createMapOptions(float $lat = -43.00, float $lng = 29.20, int $zoom = 7): MapOptions
    {
        $latLng = new LatLng(lat: $lat, lng: $lng);
        return new MapOptions(center: $latLng, zoom: $zoom);
    }

    static function createGoogleMapBasic(): GoogleMap
    {
        $googleMap = new GoogleMap();
        return $googleMap
            ->setLoaderOptions(self::createLoaderOptions())
            ->setMapOptions(self::createMapOptions());
    }

    static function createGoogleMapWithMarkers(float $lat = -43.12, float $lng = 29.22): GoogleMap
    {
        $googleMap = new GoogleMap();
        return $googleMap
            ->setLoaderOptions(self::createLoaderOptions())
            ->setMapOptions(self::createMapOptions())
            ->setMarkers([new Marker(position: new LatLng(lat: $lat, lng: $lng))]);
    }

    static function createGoogleMapWithDisabledDefaultUi(): GoogleMap
    {
        $mapOptions = self::createMapOptions();
        $mapOptions->setDisableDefaultUI(true);
        $googleMap = new GoogleMap();
        return $googleMap
            ->setLoaderOptions(self::createLoaderOptions())
            ->setMapOptions($mapOptions);
    }

}