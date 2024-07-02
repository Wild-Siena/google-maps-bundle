<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Model;

class GoogleMap
{
    protected LoaderOptions $loaderOptions;
    protected MapOptions $mapOptions;

    /**
     * @return LoaderOptions
     */
    public function getLoaderOptions(): LoaderOptions
    {
        return $this->loaderOptions;
    }

    /**
     * @param LoaderOptions $loaderOptions
     * @return GoogleMap
     */
    public function setLoaderOptions(LoaderOptions $loaderOptions): GoogleMap
    {
        $this->loaderOptions = $loaderOptions;
        return $this;
    }

    /**
     * @return MapOptions
     */
    public function getMapOptions(): MapOptions
    {
        return $this->mapOptions;
    }

    /**
     * @param MapOptions $mapOptions
     * @return GoogleMap
     */
    public function setMapOptions(MapOptions $mapOptions): GoogleMap
    {
        $this->mapOptions = $mapOptions;
        return $this;
    }
}