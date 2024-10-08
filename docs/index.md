Usage
===============
This is a simple example how you can use this bundle.

### References
See references of php classes and some examples.

- [GoogleMap](./google_map_reference.md) class
- [LoaderOptions](./loader_options_reference.md) class
- [MapOptions](./map_options_reference.md) class
- [LatLng](./lat_lng_reference.md) class
- [Marker](./marker_reference.md) class

### Basic
```php
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use WildSiena\GoogleMapsBundle\Model\GoogleMap;
use WildSiena\GoogleMapsBundle\Model\LoaderOptions;
use WildSiena\GoogleMapsBundle\Model\MapOptions;
use WildSiena\GoogleMapsBundle\Model\LatLng;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    #[Template('home/index.html.twig')]
    public function index(): array
    {
            
            $loaderOptions = new LoaderOptions(apiKey: '<YOUR_API_KEY>', version: 'weekly');    
            $mapOptions = new MapOptions(center: new LatLng(lat: 24.01, lng: 32.22), zoom: 7);
                
            $googleMap = new GoogleMap();
            $googleMap
                ->setLoaderOptions($loaderOptions)
                ->setMapOptions($mapOptions);
    
            return [
                'map' => $googleMap,
            ];
    }
}
```

Now you can use your generated GoogleMap model and the google_maps twig function in your template.

```html
{{ google_maps(map) }}
```

The google_maps twig function has a second parameter. There you can set attributes like class.

```html
{{ google_maps(map, {class: 'h-full'}) }}
```

This will render something like this.

```html
<div data-controller="wild-siena--google-maps-bundle--google-maps" class="h-full" ...></div>
```

There is a second twig function if you want only the generated attributes.
You have to put it into a html tag.

```html
<div {{ google_maps_attrs(map) }}></div>
```

Examples
========

### Example with Marker

When you use marker you need a mapId.

```php
use WildSiena\GoogleMapsBundle\Model\LoaderOptions;
use WildSiena\GoogleMapsBundle\Model\MapOptions; 
use WildSiena\GoogleMapsBundle\Model\GoogleMap;
use WildSiena\GoogleMapsBundle\Model\LatLng;
use WildSiena\GoogleMapsBundle\Model\Marker;
// ...
$loaderOptions = new LoaderOptions(apiKey: '<YOUR_API_KEY>', version: 'weekly');    
$mapOptions = new MapOptions(center: new LatLng(lat: 24.01, lng: 32.22), zoom: 7);
$mapOptions->setMapId('DEMO_MAP_ID'); // You can use DEMO_MAP_ID for development purposes
$markers = [new Marker(position: new LatLng(lat:24.01, lng:32.22))];
    
$googleMap = new GoogleMap();
$googleMap
    ->setLoaderOptions($loaderOptions)
    ->setMapOptions($mapOptions)
    ->setMarkers($markers);
// ...
```

### Example with dependency injection

If you want to inject LoaderOptions you need update your services config

```yaml
# config/services.yaml
services:
    WildSiena\GoogleMapsBundle\Model\LoaderOptions:
        arguments:
            $apiKey: '<YOUR_API_KEY>'
            $version: 'weekly'
```

```php
use WildSiena\GoogleMapsBundle\Model\LoaderOptions;
use WildSiena\GoogleMapsBundle\Model\MapOptions; 
use WildSiena\GoogleMapsBundle\Model\GoogleMap;
use WildSiena\GoogleMapsBundle\Model\LatLng;
use WildSiena\GoogleMapsBundle\Model\Marker;
// ...
#[Route('/', name: 'app_home')]
#[Template('home/index.html.twig')]
public function index(LoaderOptions $loaderOptions, GoogleMap $googleMap): array
{
    $mapOptions = new MapOptions(center: new LatLng(lat: 24.01, lng: 32.22), zoom: 7);
    $markers = [new Marker(position: new LatLng(lat:24.01, lng:32.22))];
        
    $googleMap
        ->setLoaderOptions($loaderOptions)
        ->setMapOptions($mapOptions)
        ->setMarkers($markers);
// ...
```

### Example with disabled ui

```php
use WildSiena\GoogleMapsBundle\Model\LoaderOptions;
use WildSiena\GoogleMapsBundle\Model\MapOptions; 
use WildSiena\GoogleMapsBundle\Model\GoogleMap;
use WildSiena\GoogleMapsBundle\Model\LatLng;
use WildSiena\GoogleMapsBundle\Model\Marker;
// ...
$loaderOptions = new LoaderOptions(apiKey: '<YOUR_API_KEY>', version: 'weekly');    
$mapOptions = new MapOptions(center: new LatLng(lat: 24.01, lng: 32.22), zoom: 7);
$mapOptions->setMapId('DEMO_MAP_ID') // You can ues DEMO_MAP_ID for development purposes
    ->setDisableDefaultUI(true);
$markers = [new Marker(position: new LatLng(lat:24.01, lng:32.22))]
    
$googleMap = new GoogleMap();
$googleMap
    ->setLoaderOptions($loaderOptions)
    ->setMapOptions($mapOptions)
    ->setMarkers($markers);
// ...
```

### Example using controls

```php
use WildSiena\GoogleMapsBundle\Model\LoaderOptions;
use WildSiena\GoogleMapsBundle\Model\MapOptions; 
use WildSiena\GoogleMapsBundle\Model\GoogleMap;
use WildSiena\GoogleMapsBundle\Model\LatLng;
// ...
$loaderOptions = new LoaderOptions(apiKey: '<YOUR_API_KEY>', version: 'weekly');    
$mapOptions = new MapOptions(center: new LatLng(lat: 24.01, lng: 32.22), zoom: 7);
$mapOptions->setDisableDefaultUI(true)
    ->setZoomControl(true)
    ->setMapTypeControl(true)
    ->setScaleControl(true)
    ->setStreetViewControl(true)
    ->setRotateControl(true)
    ->setFullscreenControl(true);
    
$googleMap = new GoogleMap();
$googleMap
    ->setLoaderOptions($loaderOptions)
    ->setMapOptions($mapOptions)
// ...
```

### Example changing map display to Satellite

```php
use WildSiena\GoogleMapsBundle\Model\LoaderOptions;
use WildSiena\GoogleMapsBundle\Model\MapOptions; 
use WildSiena\GoogleMapsBundle\Model\GoogleMap; 
use WildSiena\GoogleMapsBundle\Model\LatLng;
use WildSiena\GoogleMapsBundle\Enum\MapType;
// ...
$loaderOptions = new LoaderOptions(apiKey: '<YOUR_API_KEY>', version: 'weekly');    
$mapOptions = new MapOptions(center: new LatLng(lat: 24.01, lng: 32.22), zoom: 7);
$mapOptions->setMapTypeId(MapType::SATELLITE);

$googleMap = new GoogleMap();    
$googleMap
    ->setLoaderOptions($loaderOptions)
    ->setMapOptions($mapOptions)
// ...
```



