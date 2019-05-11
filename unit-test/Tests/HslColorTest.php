<?php

namespace DennisTrukhin\ColorTools\Tests;

use DennisTrukhin\ColorTools\HslColor;
use PHPUnit\Framework\TestCase;

class HslColorTest extends TestCase
{

    const HUE_VALUE = 128;
    const SATURATION_VALUE = 64;
    const LIGHTNESS_VALUE = 192;

    public function testFromValues()
    {
        $color = HslColor::fromValues(self::HUE_VALUE, self::SATURATION_VALUE, self::LIGHTNESS_VALUE);
        $this->assertEquals(self::HUE_VALUE, $color->getHue());
        $this->assertEquals(self::SATURATION_VALUE, $color->getSaturation());
        $this->assertEquals(self::LIGHTNESS_VALUE, $color->getLightness());
    }

}
