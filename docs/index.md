Usage
===============
Using dependencies injection you can use the GoogleMap Model in your services and controller

```php
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use WildSiena\GoogleMapsBundle\Model\GoogleMap;
use WildSiena\GoogleMapsBundle\Model\LoaderOptions;
use WildSiena\GoogleMapsBundle\Model\MapOptions;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    #[Template('home/index.html.twig')]
    public function index(GoogleMap $googleMap): array
    {
            $loaderOptions = new LoaderOptions();
            $loaderOptions
                ->setApiKey('<YOUR_API_KEY>')
                ->setVersion('weekly');
                
            $mapOptions = new MapOptions();
            $mapOptions
                ->setCenter(['lat' => 24.01, 'lng' => 32.22])
                ->setZoom(7);
                
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

There is a second twig function if you want only the generated attributes.
You have to put it into a html tag.

```html
<div {{ google_maps_attrs(map) }}></div>
```