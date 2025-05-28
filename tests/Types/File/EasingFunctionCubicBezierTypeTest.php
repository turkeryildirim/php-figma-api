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
        $this->expectException(TypeError::class);
        new EasingFunctionCubicBezierType([
            'x1' => '10',
            'x2' => 20,
            'y1' => 30,
            'y2' => 40,
        ]);
    }
    public function testInvalidX2(): void
    {
        $this->expectException(TypeError::class);
        new EasingFunctionCubicBezierType([
            'x1' => 10,
            'x2' => '20',
            'y1' => 30,
            'y2' => 40,
        ]);
    }
    public function testInvalidY1(): void
    {
        $this->expectException(TypeError::class);
        new EasingFunctionCubicBezierType([
            'x1' => 10,
            'x2' => 20,
            'y1' => '30',
            'y2' => 40,
        ]);
    }
    public function testInvalidY2(): void
    {
        $this->expectException(TypeError::class);
        new EasingFunctionCubicBezierType([
            'x1' => 10,
            'x2' => 20,
            'y1' => 30,
            'y2' => '40',
        ]);
    }
}
