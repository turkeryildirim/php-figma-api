<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\ArcDataType;
use Turker\FigmaAPI\Types\File\EasingFunctionCubicBezierType;
use TypeError;

final class EasingFunctionCubicBezierTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new EasingFunctionCubicBezierType([
            'x1' => 10,
            'x2' => 20,
            'y1' => 30,
            'y2' => 40,
        ]);
        $this->assertEquals('10', $class->x1);
        $this->assertEquals('20', $class->x2);
        $this->assertEquals('30', $class->y1);
        $this->assertEquals('40', $class->y2);
    }
    public function testInvalidX1(): void
    {
        $class = new EasingFunctionCubicBezierType([
            'x1' => 'aa',
            'x2' => 20,
            'y1' => 30,
            'y2' => 40,
        ]);
        $this->assertNull($class->x1);
    }
    public function testInvalidX2(): void
    {
        $class = new EasingFunctionCubicBezierType([
            'x1' => 10,
            'x2' => 'aa',
            'y1' => 30,
            'y2' => 40,
        ]);
        $this->assertNull($class->x2);
    }
    public function testInvalidY1(): void
    {
        $class = new EasingFunctionCubicBezierType([
            'x1' => 10,
            'x2' => 20,
            'y1' => 'aa',
            'y2' => 40,
        ]);
        $this->assertNull($class->y1);
    }
    public function testInvalidY2(): void
    {
        $class = new EasingFunctionCubicBezierType([
            'x1' => 10,
            'x2' => 20,
            'y1' => 30,
            'y2' => 'aa',
        ]);
        $this->assertNull($class->y2);
    }
}
