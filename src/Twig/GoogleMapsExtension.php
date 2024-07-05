<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Twig;

use Symfony\Component\Serializer\SerializerInterface;
use Symfony\UX\StimulusBundle\Dto\StimulusAttributes;
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

    /**
     * @param GoogleMap $googleMap
     * @param array<string, string> $attributes
     * @return string
     */
    public function renderGoogleMaps(GoogleMap $googleMap, array $attributes = []): string
    {
        $stimulusAttributes = $this->stimulusHelper->createStimulusAttributes();
        foreach ($attributes as $attribute => $value) {
            $stimulusAttributes->addAttribute($attribute, $value);
        }

        $googleMapControllerAttrs = $this->buildHtmlAttributes($stimulusAttributes, $googleMap);
        return sprintf('<div %s></div>', $googleMapControllerAttrs);
    }

    public function getGoogleMapsAttributes(GoogleMap $googleMap): string
    {
        $stimulusAttributes = $this->stimulusHelper->createStimulusAttributes();
        return $this->buildHtmlAttributes($stimulusAttributes, $googleMap);
    }

    private function buildHtmlAttributes(StimulusAttributes $stimulusAttributes, GoogleMap $googleMap): string
    {

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