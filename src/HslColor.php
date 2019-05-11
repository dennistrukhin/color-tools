<?php

namespace DennisTrukhin\ColorTools;

class HslColor
{

    private $hue = 0;
    private $saturation = 0;
    private $lightness = 0;

    /**
     * @return int
     */
    public function getHue(): int
    {
        return $this->hue;
    }

    /**
     * @param int $hue
     */
    public function setHue(int $hue): void
    {
        $this->hue = $hue;
    }

    /**
     * @return int
     */
    public function getSaturation(): int
    {
        return $this->saturation;
    }

    /**
     * @param int $saturation
     */
    public function setSaturation(int $saturation): void
    {
        $this->saturation = $saturation;
    }

    /**
     * @return int
     */
    public function getLightness(): int
    {
        return $this->lightness;
    }

    /**
     * @param int $lightness
     */
    public function setLightness(int $lightness): void
    {
        $this->lightness = $lightness;
    }

    /**
     * Creates an HSL color from values for hue, saturation and lightness
     *
     * @param int $hue
     * @param int $saturation
     * @param int $lightness
     * @return HslColor
     */
    public static function fromValues(int $hue, int $saturation, int $lightness)
    {
        $color = new self();
        $color->setHue($hue);
        $color->setSaturation($saturation);
        $color->setLightness($lightness);

        return $color;
    }

}
