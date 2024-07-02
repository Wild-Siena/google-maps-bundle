<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Model;

class MapOptions
{
    /**
     * @var array{lat: float, lng: float}
     */
    protected array $center;
    protected int $zoom;

    /**
     * @return array{lat: float, lng: float}
     */
    public function getCenter(): array
    {
        return $this->center;
    }

    /**
     * @param array{lat: float, lng: float} $center
     * @return MapOptions
     */
    public function setCenter(array $center): MapOptions
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



}