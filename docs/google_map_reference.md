GoogleMap
==========

GoogleMap object that is needed to render google maps in twig template.

Constructor
-----------

```GoogleMap()```

Properties
----------

**loaderOptions**: LoaderOptions

LoaderOptions object that contains ``apiKey`` and ``version``

**mapOptions**: MapOptions

MapOptions object to define your map.

**markers**: array

A list of coordinates for setting markers on the map.

Examples
--------
Basic example to create a GoogleMap object.
```php
use WildSiena\GoogleMapsBundle\Model\GoogleMap;
use WildSiena\GoogleMapsBundle\Model\LoaderOptions;
use WildSiena\GoogleMapsBundle\Model\MapOptions;
use WildSiena\GoogleMapsBundle\Model\LatLng;

$loaderOptions = new LoaderOptions(apiKey: '<YOUR_API_KEY>', version: 'weekly');
$mapOptions = new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
$googleMap = new GoogleMap();
$googleMap
    ->setLoaderOptions($loaderOptions)
    ->setMapOptions($mapOptions);

```

Example with markers.
```php
use WildSiena\GoogleMapsBundle\Model\GoogleMap;
use WildSiena\GoogleMapsBundle\Model\LoaderOptions;
use WildSiena\GoogleMapsBundle\Model\MapOptions;
use WildSiena\GoogleMapsBundle\Model\LatLng;
use WildSiena\GoogleMapsBundle\Model\Marker;

$loaderOptions = new LoaderOptions(apiKey: '<YOUR_API_KEY>', version: 'weekly');
$mapOptions = new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
$googleMap = new GoogleMap();
$markers = [
    new Marker(position: new LatLng(lat: 21.21, lng: 21.21)),
    new Marker(position: new LatLng(lat: 22.22, lng: 22.22))
];
$googleMap
    ->setLoaderOptions($loaderOptions)
    ->setMapOptions($mapOptions)
    ->setMarkers($markers);
```