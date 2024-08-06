MapOptions
==========

The MapOptions object is needed for the Map constructor in JavaScript.
With this object you can define your map.

Constructor
-----------

```MapOptions($center, $zoom)```

Properties
----------

**center**: LatLng

Coordinate to positioning your map.

**zoom**: integer

Zoom level of your map.

**mapId**: string (optional)

Map id for using markers. In development, you can set it to ``DEMO_MAP_ID``.

**disableDefaultUI**: boolean (optional)

When set to ``true`` it deactivate the default ui.
That means you see no buttons like zoom in or zoom out.

**zoomControl**:

When set to ``true`` it will display the zoom buttons + and -

**mapTypeControl**:

When set to ``true`` it will display the button to switch between map and satellite.

**scaleControl**:

When set to ``true`` you see the map scale.

**streetViewControl**:

When set to ``true`` you see the Pegman control that can be dragged and dropped on the map.

**rotateControl**:

When set to ``true`` you see the Button where you can change tilt and rotate options for maps containing oblique imagery.

**fullscreenControl**:

When set to ``true`` you see the fullscreen button.

Examples
--------

Create a new MapOptions instance.
```php
use WildSiena\GoogleMapsBundle\Model\MapOptions;

new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
```

Create a new MapOptions instance with mapId.
```php
use WildSiena\GoogleMapsBundle\Model\MapOptions;

$mapOptions = new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
$mapOptions->setMapId("DEMO_MAP_ID");
```

Create a new MapOptions instance with disabled default ui.
```php
use WildSiena\GoogleMapsBundle\Model\MapOptions;

$mapOptions = new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
$mapOptions->setDisableDefaultUI(false);
```

Create a new MapOptions instance with disabled default ui and activated zoom control.

```php
use WildSiena\GoogleMapsBundle\Model\MapOptions;

$mapOptions = new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
$mapOptions->setDisableDefaultUI(false)
    ->setZoomControl(true);
```

Create a new MapOptions instance with disabled default ui and activated map type control.

```php
use WildSiena\GoogleMapsBundle\Model\MapOptions;

$mapOptions = new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
$mapOptions->setDisableDefaultUI(false)
    ->setMapTypeControl(true);
```

Create a new MapOptions instance with disabled default ui and activated scale control.

```php
use WildSiena\GoogleMapsBundle\Model\MapOptions;

$mapOptions = new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
$mapOptions->setDisableDefaultUI(false)
    ->setScaleControl(true);
```

Create a new MapOptions instance with disabled default ui and activated street view control.

```php
use WildSiena\GoogleMapsBundle\Model\MapOptions;

$mapOptions = new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
$mapOptions->setDisableDefaultUI(false)
    ->setStreetViewControl(true);
```

Create a new MapOptions instance with disabled default ui and activated rotate control.

```php
use WildSiena\GoogleMapsBundle\Model\MapOptions;

$mapOptions = new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
$mapOptions->setDisableDefaultUI(false)
    ->setRotateControl(true);
```

Create a new MapOptions instance with disabled default ui and activated fullscreen control.

```php
use WildSiena\GoogleMapsBundle\Model\MapOptions;

$mapOptions = new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
$mapOptions->setDisableDefaultUI(false)
    ->setFullscreenControl(true);
```