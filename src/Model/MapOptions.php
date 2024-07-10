<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Model;

class MapOptions
{
    protected string $mapId;

    /**
     * @param array{lat: float, lng: float}|LatLng $center
     * @param int $zoom
     */
    public function __construct(protected array|LatLng $center, protected int $zoom)
    {

    }

    /**
     * @return array{lat: float, lng: float}|LatLng
     */
    public function getCenter(): array|LatLng
    {
        return $this->center;
    }

    /**
     * @param array{lat: float, lng: float}|LatLng $center
     * @return MapOptions
     */
    public function setCenter(array|LatLng $center): MapOptions
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



}