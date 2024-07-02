<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Twig;

use Symfony\Component\Serializer\SerializerInterface;
use Symfony\UX\StimulusBundle\Helper\StimulusHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use WildSiena\GoogleMapsBundle\Model\GoogleMap;

class GoogleMapsExtension extends AbstractExtension
{

    public function __construct(
        private readonly StimulusHelper $stimulusHelper,
        private readonly SerializerInterface $serializer
    )
    {

    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('google_maps',
                [$this, 'renderGoogleMaps'],
                ['is_safe' => ['html_attr']],
            ),
            new TwigFunction('google_maps_attrs',
                [$this, 'getGoogleMapsAttributes'],
                ['is_safe' => ['html_attr']],
            ),
        ];
    }

    public function renderGoogleMaps(GoogleMap $googleMap): string
    {
        $googleMapControllerAttrs = $this->getGoogleMapsAttributes($googleMap);
        return sprintf('<div %s></div>', $googleMapControllerAttrs);
    }

    public function getGoogleMapsAttributes(GoogleMap $googleMap): string
    {
        $stimulusAttributes = $this->stimulusHelper->createStimulusAttributes();
        $stimulusAttributes->addController(
            controllerName: 'wild-siena/google-maps-bundle/google_maps',
            controllerValues: [
                'loaderOptions' => $this->serializer->serialize($googleMap->getLoaderOptions(), 'json'),
                'mapOptions' => $this->serializer->serialize($googleMap->getMapOptions(), 'json'),
            ]
        );
        return sprintf('%s', $stimulusAttributes);
    }

}