<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Model;

class LatLng implements \JsonSerializable
{
    public function __construct(protected float $lat, protected float $lng)
    {

    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     * @return LatLng
     */
    public function setLat(float $lat): LatLng
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return float
     */
    public function getLng(): float
    {
        return $this->lng;
    }

    /**
     * @param float $lng
     * @return LatLng
     */
    public function setLng(float $lng): LatLng
    {
        $this->lng = $lng;
        return $this;
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        return \get_object_vars($this);
    }

}