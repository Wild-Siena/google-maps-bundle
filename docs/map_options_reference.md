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

**zoomControl**: bool (optional)

When set to ``true`` it will display the zoom buttons + and -

**mapTypeControl**: bool (optional)

When set to ``true`` it will display the button to switch between map and satellite.

**scaleControl**: bool (optional)

When set to ``true`` you see the map scale.

**streetViewControl**: bool (optional)

When set to ``true`` you see the Pegman control that can be dragged and dropped on the map.

**rotateControl**: bool (optional)

When set to ``true`` you see the Button where you can change tilt and rotate options for maps containing oblique
imagery.

**fullscreenControl**: bool (optional)

When set to ``true`` you see the fullscreen button.

**mapTypeId**: MapType (optional)

You can set the mapTypeId to four different values.
``MapType::ROADMAP``, ``MapType::SATELLITE``, ``MapType::HYBRID``, ``MapType::TERRAIN``
This property lets you change in which style the map is displayed.

**gestureHandling**: GestureType (optional)

You can set the gestureHandling to four different values.
``GestureType::COOPERATIVE``, ``GestureType::AUTO``, ``GestureType::GREEDY``, ``GestureType::NONE``
With this property you can change the zoom behavior when scrolling.

**colorScheme**: ColorSchemeType (optional)

You can set the colorScheme to three different values.
``ColorSchemeType::LIGHT``, ``ColorSchemeType::DARK``, ``ColorSchemeType::FOLLOW_SYSTEM``
With this property you can change light or dark mode of a map. This is only possible for the map type ``terrain`` and
``roadmap``.



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

Create a new MapOptions instance with display a satellite map.

```php
use WildSiena\GoogleMapsBundle\Model\MapOptions;
use WildSiena\GoogleMapsBundle\Enum\MapType;

$mapOptions = new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
$mapOptions->setMapTypeId(MapType::SATELLITE);
```

Create a new MapOptions instance with gestureType set to cooperative.

```php
use WildSiena\GoogleMapsBundle\Model\MapOptions;
use WildSiena\GoogleMapsBundle\Enum\GestureType;

$mapOptions = new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
$mapOptions->setGestureHandling(GestureType::COOPERATIVE);
```

Create a new MapOptions instance with colorScheme set to DARK.

```php
use WildSiena\GoogleMapsBundle\Model\MapOptions;
use WildSiena\GoogleMapsBundle\Enum\ColorSchemeType;

$mapOptions = new MapOptions(center: new LatLng(lat: 42.42, lng: 42.42), zoom: 7);
$mapOptions->setColorScheme(ColorSchemeType::DARK);
```