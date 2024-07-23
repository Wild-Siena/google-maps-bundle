LoaderOptions
==========

The LoaderOptions object is needed for creating a map. The LoaderOptions object contains the ``apiKey``
and the ``version`` property.

Constructor
-----------

```LoaderOptions($apiKey, $version)```

Properties
----------

**apiKey**: string

Google maps API key.

**version**: string

Version number of google maps.
You can add ``weekly``, ``quarterly``, ``beta``, ``alpha``, or a Version number like ``3.57``


Examples
--------
Basic Example
```php
use WildSiena\GoogleMapsBundle\Model\LoaderOptions;

new LoaderOptions(apiKey: '<YOUR_API_KEY>', version: 'weekly');
```