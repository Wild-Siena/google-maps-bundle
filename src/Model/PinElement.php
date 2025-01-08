<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Model;

class PinElement
{
    protected float $scale;
    protected string $background;
    protected string $borderColor;
    protected string $glyphColor;
    protected string $glyph;

    /**
     * @return float
     */
    public function getScale(): float
    {
        return $this->scale;
    }

    /**
     * @param float $scale
     * @return PinElement
     */
    public function setScale(float $scale): PinElement
    {
        $this->scale = $scale;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackground(): string
    {
        return $this->background;
    }

    /**
     * @param string $background
     * @return PinElement
     */
    public function setBackground(string $background): PinElement
    {
        $this->background = $background;
        return $this;
    }

    /**
     * @return string
     */
    public function getBorderColor(): string
    {
        return $this->borderColor;
    }

    /**
     * @param string $borderColor
     * @return PinElement
     */
    public function setBorderColor(string $borderColor): PinElement
    {
        $this->borderColor = $borderColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getGlyphColor(): string
    {
        return $this->glyphColor;
    }

    /**
     * @param string $glyphColor
     * @return PinElement
     */
    public function setGlyphColor(string $glyphColor): PinElement
    {
        $this->glyphColor = $glyphColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getGlyph(): string
    {
        return $this->glyph;
    }

    /**
     * @param string $glyph
     * @return PinElement
     */
    public function setGlyph(string $glyph): PinElement
    {
        $this->glyph = $glyph;
        return $this;
    }
}