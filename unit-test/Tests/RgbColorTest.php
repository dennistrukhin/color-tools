<?php

namespace DennisTrukhin\ColorTools\Tests;

use DennisTrukhin\ColorTools\InvalidArgumentException;
use DennisTrukhin\ColorTools\RgbColor;
use PHPUnit\Framework\TestCase;

class RgbColorTest extends TestCase
{

    const RED_VALUE = 128;
    const GREEN_VALUE = 64;
    const BLUE_VALUE = 192;

    /**
     * @throws InvalidArgumentException
     */
    public function testFromChannels()
    {
        $color = RgbColor::fromChannels(self::RED_VALUE, self::GREEN_VALUE, self::BLUE_VALUE);
        $this->assertEquals(self::RED_VALUE, $color->getRed());
        $this->assertEquals(self::GREEN_VALUE, $color->getGreen());
        $this->assertEquals(self::BLUE_VALUE, $color->getBlue());
    }

    /**
     * @throws InvalidArgumentException
     */
    public function testFromString()
    {
        $string = dechex(self::RED_VALUE) . dechex(self::GREEN_VALUE) . dechex(self::BLUE_VALUE);
        $color = RgbColor::fromString($string);
        $this->assertEquals(self::RED_VALUE, $color->getRed());
        $this->assertEquals(self::GREEN_VALUE, $color->getGreen());
        $this->assertEquals(self::BLUE_VALUE, $color->getBlue());
    }

    /**
     * @throws InvalidArgumentException
     */
    public function testFromChannelsWithInvalidValue()
    {
        $this->expectException(InvalidArgumentException::class);
        RgbColor::fromChannels(300, self::GREEN_VALUE, self::BLUE_VALUE);
    }

    /**
     * @throws InvalidArgumentException
     */
    public function testFromStringWithInvalidArgument()
    {
        $this->expectException(InvalidArgumentException::class);
        $string = 'invalid_string';
        RgbColor::fromString($string);
    }

}
