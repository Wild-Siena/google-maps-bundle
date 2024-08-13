<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Model;

use WildSiena\GoogleMapsBundle\Enum\MapType;

class MapOptions
{
    protected string $mapId;
    protected bool $disableDefaultUI;
    protected bool $zoomControl;
    protected bool $mapTypeControl;
    protected bool $scaleControl;
    protected bool $streetViewControl;
    protected bool $rotateControl;
    protected bool $fullscreenControl;
    protected MapType $mapTypeId;

    /**
     * @param LatLng $center
     * @param int $zoom
     */
    public function __construct(protected LatLng $center, protected int $zoom)
    {

    }

    /**
     * @return LatLng
     */
    public function getCenter(): LatLng
    {
        return $this->center;
    }

    /**
     * @param LatLng $center
     * @return MapOptions
     */
    public function setCenter(LatLng $center): MapOptions
    {
        $this->center = $center;
        return $this;
    }

    /**
     * @return int
     */
    public function getZoom(): int
    {
        return $this->zoom;
    }

    /**
     * @param int $zoom
     * @return MapOptions
     */
    public function setZoom(int $zoom): MapOptions
    {
        $this->zoom = $zoom;
        return $this;
    }

    /**
     * @return string
     */
    public function getMapId(): string
    {
        return $this->mapId;
    }

    /**
     * @param string $mapId
     * @return MapOptions
     */
    public function setMapId(string $mapId): MapOptions
    {
        $this->mapId = $mapId;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDisableDefaultUI(): bool
    {
        return $this->disableDefaultUI;
    }

    /**
     * @param bool $disableDefaultUI
     * @return MapOptions
     */
    public function setDisableDefaultUI(bool $disableDefaultUI): MapOptions
    {
        $this->disableDefaultUI = $disableDefaultUI;
        return $this;
    }

    /**
     * @return bool
     */
    public function isZoomControl(): bool
    {
        return $this->zoomControl;
    }

    /**
     * @param bool $zoomControl
     * @return MapOptions
     */
    public function setZoomControl(bool $zoomControl): MapOptions
    {
        $this->zoomControl = $zoomControl;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMapTypeControl(): bool
    {
        return $this->mapTypeControl;
    }

    /**
     * @param bool $mapTypeControl
     * @return MapOptions
     */
    public function setMapTypeControl(bool $mapTypeControl): MapOptions
    {
        $this->mapTypeControl = $mapTypeControl;
        return $this;
    }

    /**
     * @return bool
     */
    public function isScaleControl(): bool
    {
        return $this->scaleControl;
    }

    /**
     * @param bool $scaleControl
     * @return MapOptions
     */
    public function setScaleControl(bool $scaleControl): MapOptions
    {
        $this->scaleControl = $scaleControl;
        return $this;
    }

    /**
     * @return bool
     */
    public function isStreetViewControl(): bool
    {
        return $this->streetViewControl;
    }

    /**
     * @param bool $streetViewControl
     * @return MapOptions
     */
    public function setStreetViewControl(bool $streetViewControl): MapOptions
    {
        $this->streetViewControl = $streetViewControl;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRotateControl(): bool
    {
        return $this->rotateControl;
    }

    /**
     * @param bool $rotateControl
     * @return MapOptions
     */
    public function setRotateControl(bool $rotateControl): MapOptions
    {
        $this->rotateControl = $rotateControl;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFullscreenControl(): bool
    {
        return $this->fullscreenControl;
    }

    /**
     * @param bool $fullscreenControl
     * @return MapOptions
     */
    public function setFullscreenControl(bool $fullscreenControl): MapOptions
    {
        $this->fullscreenControl = $fullscreenControl;
        return $this;
    }

    /**
     * @return MapType
     */
    public function getMapTypeId(): MapType
    {
        return $this->mapTypeId;
    }

    /**
     * Set mapTypeId allowed mapTypes are roadmap, satellite, hybrid and terrain.
     * With this function you can change the display of the map.
     * @param MapType $mapTypeId
     * @return MapOptions
     */
    public function setMapTypeId(MapType $mapTypeId): MapOptions
    {
        $this->mapTypeId = $mapTypeId;
        return $this;
    }


    
}