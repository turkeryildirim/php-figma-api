<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\RectangleType;
use TypeError;

final class RectangleTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new RectangleType([
            'x' => 10,
            'y' => 20,
            'width' => 30,
            'height' => 40,
        ]);
        $this->assertEquals('10', $class->x);
        $this->assertEquals('20', $class->y);
        $this->assertEquals('30', $class->width);
        $this->assertEquals('40', $class->height);
    }
    public function testWithMinData(): void
    {
        $class = new RectangleType([
            'width' => 30,
            'height' => 40,
        ]);
        $this->assertEquals('0', $class->x);
        $this->assertEquals('0', $class->y);
        $this->assertEquals('30', $class->width);
        $this->assertEquals('40', $class->height);
    }
    public function testInvalidWidth(): void
    {
        $class = new RectangleType([
            'width' => 'a',
            'height' => 40,
        ]);
        $this->assertNull($class->width);
    }
    public function testInvalidHeight(): void
    {
        $class = new RectangleType([
            'height' => 'a',
            'width' => 40,
        ]);
        $this->assertNull($class->height);
    }
}
