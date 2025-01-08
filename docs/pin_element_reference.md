PinElement
==========

The PinElement is needed to customize the Google Maps marker.
For more information see [basic marker customization](https://developers.google.com/maps/documentation/javascript/advanced-markers/basic-customization)

Properties
----------

**scale**: float (optional)

Set the size of the marker.

**background**: string (optional)

Set background color for the marker.

**borderColor**: string (optional)

Set border color for the marker.

**glyphColor**: string (optional)

Set glyph color for the marker.

**glyph**: string (optional)

Set a glyph for the marker.

Examples
--------

Basic Example
```php
use WildSiena\GoogleMapsBundle\Model\PinElement;

$pin = new PinElement();
$pin->setBackground("#333")
    ->setGlyph("A");
```