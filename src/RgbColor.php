<?php

namespace DennisTrukhin\ColorTools;

class RgbColor
{

    private $red = 0;
    private $green = 0;
    private $blue = 0;

    /**
     * @return int
     */
    public function getRed(): int
    {
        return $this->red;
    }

    /**
     * @param int $red
     */
    public function setRed(int $red): void
    {
        $this->red = $red;
    }

    /**
     * @return int
     */
    public function getGreen(): int
    {
        return $this->green;
    }

    /**
     * @param int $green
     */
    public function setGreen(int $green): void
    {
        $this->green = $green;
    }

    /**
     * @return int
     */
    public function getBlue(): int
    {
        return $this->blue;
    }

    /**
     * @param int $blue
     */
    public function setBlue(int $blue): void
    {
        $this->blue = $blue;
    }


    /**
     * Creates an RGB color from hex string in 'ffffff' of '#ffffff' format
     *
     * @param string $hexString
     * @return RgbColor
     * @throws InvalidArgumentException
     */
    public static function fromString(string $hexString)
    {
        if (!preg_match("/^#?([0-9a-fA-F]{6})$/", $hexString)) {
            throw new InvalidArgumentException('HexString should be in "ffffff" or "#ffffff" format');
        }

        $channels = sscanf($hexString, '%2x%2x%2x');
        $color = self::fromChannels(...$channels);

        return $color;
    }

    /**
     * Creates an RGB color from values for red, green and blue channels
     *
     * @param int $r
     * @param int $g
     * @param int $b
     * @return RgbColor
     * @throws InvalidArgumentException
     */
    public static function fromChannels(int $r, int $g, int $b)
    {
        if ($r < 0 || $r > 255 || $g < 0 || $g > 255 || $b < 0 || $b > 255) {
            throw new InvalidArgumentException('Channel values should be between 0 and 255');
        }

        $color = new self();
        $color->setRed($r);
        $color->setGreen($g);
        $color->setBlue($b);

        return $color;
    }

}
