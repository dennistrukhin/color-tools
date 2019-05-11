<?php

namespace DennisTrukhin\ColorTools;

class SpaceConverter
{

    public function rgb2hsl(RgbColor $rgbColor)
    {
        $r = $rgbColor->getRed() / 255;
        $g = $rgbColor->getGreen() / 255;
        $b = $rgbColor->getBlue() / 255;

        $max = max($r, $g, $b);
        $min = min($r, $g, $b);
        $diff = $max - $min;

        $lightness = ($max + $min) / 2;

        if ($diff == 0) {
            // Gray color, so saturation and lightness are equal to zero
            return HslColor::fromValues(0, 0, (int)round($lightness * 100));
        }

        if ($max === $r) {
            $hue = 60 * fmod(($g - $b) / $diff, 6);
            if ($b > $g) {
                $hue += 360;
            }
        } elseif ($max == $g) {
            $hue = 60 * (($b - $r) / $diff + 2);
        } else {
            $hue = 60 * (($r - $g) / $diff + 4);
        }

        $saturation = $diff / (1 - abs(2 * $lightness - 1));

        return HslColor::fromValues((int)round($hue), (int)round($saturation * 100), (int)round($lightness * 100));
    }

    /**
     * @param HslColor $hslColor
     * @return RgbColor
     * @throws InvalidArgumentException
     */
    public function hsl2rgb(HslColor $hslColor)
    {
        $c = (1 - abs(2 * $hslColor->getLightness() / 100 - 1)) * $hslColor->getSaturation() / 100;
        $x = $c * (1 - abs(fmod(($hslColor->getHue() / 60), 2) - 1));
        $m = $hslColor->getLightness() / 100 - ($c / 2);

        $mChannel = (int)floor($m * 255);
        $cChannel = (int)floor(($c + $m) * 255);
        $xChannel = (int)floor(($x + $m) * 255);

        if ($hslColor->getHue() < 60) {
            return RgbColor::fromChannels($cChannel, $xChannel, $mChannel);
        }
        if ($hslColor->getHue() < 120) {
            return RgbColor::fromChannels($xChannel, $cChannel, $mChannel);
        }
        if ($hslColor->getHue() < 180) {
            return RgbColor::fromChannels($mChannel, $cChannel, $xChannel);
        }
        if ($hslColor->getHue() < 240) {
            return RgbColor::fromChannels($mChannel, $xChannel, $cChannel);
        }
        if ($hslColor->getHue() < 300) {
            return RgbColor::fromChannels($xChannel, $mChannel, $cChannel);
        }

        return RgbColor::fromChannels($cChannel, $mChannel, $xChannel);
    }

}