<?php

namespace DennisTrukhin\ColorTools\Tests;

use DennisTrukhin\ColorTools\HslColor;
use DennisTrukhin\ColorTools\InvalidArgumentException;
use DennisTrukhin\ColorTools\RgbColor;
use DennisTrukhin\ColorTools\SpaceConverter;
use PHPUnit\Framework\TestCase;

class SpaceConverterTest extends TestCase
{

    /**
     * @throws InvalidArgumentException
     */
    public function testRgb2hsl()
    {
        $rgbColor = RgbColor::fromString('F0C80E');
        $hslColor = (new SpaceConverter())->rgb2hsl($rgbColor);
        $this->assertEquals(49, $hslColor->getHue());
        $this->assertEquals(89, $hslColor->getSaturation());
        $this->assertEquals(50, $hslColor->getLightness());

        $rgbColor = RgbColor::fromString('1EAC41');
        $hslColor = (new SpaceConverter())->rgb2hsl($rgbColor);
        $this->assertEquals(135, $hslColor->getHue());
        $this->assertEquals(70, $hslColor->getSaturation());
        $this->assertEquals(40, $hslColor->getLightness());

        $rgbColor = RgbColor::fromString('1142F0');
        $hslColor = (new SpaceConverter())->rgb2hsl($rgbColor);
        $this->assertEquals(227, $hslColor->getHue());
        $this->assertEquals(88, $hslColor->getSaturation());
        $this->assertEquals(50, $hslColor->getLightness());
    }

    /**
     * @throws InvalidArgumentException
     */
    public function testRgb2hslGray()
    {
        $rgbColor = RgbColor::fromString('888888');
        $hslColor = (new SpaceConverter())->rgb2hsl($rgbColor);
        $this->assertEquals(0, $hslColor->getHue());
        $this->assertEquals(0, $hslColor->getSaturation());
        $this->assertEquals(53, $hslColor->getLightness());
    }

    /**
     * @throws InvalidArgumentException
     */
    public function testHsl2rgb()
    {
        $hslColor = HslColor::fromValues(49, 89, 50);
        $rgbColor = (new SpaceConverter())->hsl2rgb($hslColor);
        $this->assertEquals(240, $rgbColor->getRed());
        $this->assertEquals(199, $rgbColor->getGreen());
        $this->assertEquals(14, $rgbColor->getBlue());

        $hslColor = HslColor::fromValues(115, 20, 70);
        $rgbColor = (new SpaceConverter())->hsl2rgb($hslColor);
        $this->assertEquals(165, $rgbColor->getRed());
        $this->assertEquals(193, $rgbColor->getGreen());
        $this->assertEquals(163, $rgbColor->getBlue());

        $hslColor = HslColor::fromValues(137, 75, 92);
        $rgbColor = (new SpaceConverter())->hsl2rgb($hslColor);
        $this->assertEquals(219, $rgbColor->getRed());
        $this->assertEquals(249, $rgbColor->getGreen());
        $this->assertEquals(227, $rgbColor->getBlue());

        $hslColor = HslColor::fromValues(181, 60, 42);
        $rgbColor = (new SpaceConverter())->hsl2rgb($hslColor);
        $this->assertEquals(42, $rgbColor->getRed());
        $this->assertEquals(169, $rgbColor->getGreen());
        $this->assertEquals(171, $rgbColor->getBlue());

        $hslColor = HslColor::fromValues(255, 10, 92);
        $rgbColor = (new SpaceConverter())->hsl2rgb($hslColor);
        $this->assertEquals(233, $rgbColor->getRed());
        $this->assertEquals(232, $rgbColor->getGreen());
        $this->assertEquals(236, $rgbColor->getBlue());

        $hslColor = HslColor::fromValues(351, 72, 66);
        $rgbColor = (new SpaceConverter())->hsl2rgb($hslColor);
        $this->assertEquals(230, $rgbColor->getRed());
        $this->assertEquals(105, $rgbColor->getGreen());
        $this->assertEquals(124, $rgbColor->getBlue());
    }

}