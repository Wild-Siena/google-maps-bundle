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

Map id for using markers. In development you can set it to ``DEMO_MAP_ID``.

**disableDefaultUI**: boolean (optional)

When set to ``true`` it deactivate the default ui.
That means you see no buttons like zoom in or zoom out.

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