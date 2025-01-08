<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Model;

class Marker
{
    protected string $title;
    protected PinElement $content;
    public function __construct(protected LatLng $position)
    {

    }

    /**
     * @return LatLng
     */
    public function getPosition(): LatLng
    {
        return $this->position;
    }

    /**
     * @param LatLng $position
     * @return Marker
     */
    public function setPosition(LatLng $position): Marker
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Marker
     */
    public function setTitle(string $title): Marker
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return PinElement
     */
    public function getContent(): PinElement
    {
        return $this->content;
    }

    /**
     * @param PinElement $content
     * @return Marker
     */
    public function setContent(PinElement $content): Marker
    {
        $this->content = $content;
        return $this;
    }


}