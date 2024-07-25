Marker
==========

The Marker object is needed for setting markers on the map.

Constructor
-----------

```Marker($position)```

Properties
----------

**position**: LatLng

Latitude and longitude coordinates for the marker.

**title**: string (optional)

Title for the marker. It is show when hovering over the marker.

Examples
--------
Basic Example.
```php
use WildSiena\GoogleMapsBundle\Model\Marker;

new Marker(position: new LatLng(lat: 42.42, lng: 42.42));
```

Example with title.
```php
use WildSiena\GoogleMapsBundle\Model\Marker;

new Marker(position: new LatLng(lat: 42.42, lng: 42.42), title: 'Marker 1');
```