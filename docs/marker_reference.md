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

**content**: PinElement (optional)

Customization for Marker. Set colors etc.

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

Example with content.
```php
use WildSiena\GoogleMapsBundle\Model\Marker;
use WildSiena\GoogleMapsBundle\Model\LatLng;
use WildSiena\GoogleMapsBundle\Model\PinElement;

$marker = new Marker(position: new LatLng(lat: 42.42, lng: 42.42));
$pin = new PinElement();
$pin->setBackground("#333")->setGlyph("A");
$marker->setContent($pin);
```