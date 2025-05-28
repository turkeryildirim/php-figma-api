<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\EasingType;
use TypeError;

final class EasingTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new EasingType([
            'type' => 'EASE_OUT',
            'easingFunctionCubicBezier' => ['x1' => 1,'x2' => 2,'y1' => 3,'y2' => 4],
            'easingFunctionSpring' => [
                'mass' => 10,
                'stiffness' => 20,
                'damping' => 30,
            ],
        ]);
        $this->assertEquals('EASE_OUT', $class->type->value);
        $this->assertEquals('1', $class->easingFunctionCubicBezier->x1);
        $this->assertEquals('2', $class->easingFunctionCubicBezier->x2);
        $this->assertEquals('3', $class->easingFunctionCubicBezier->y1);
        $this->assertEquals('4', $class->easingFunctionCubicBezier->y2);
        $this->assertEquals('10', $class->easingFunctionSpring->mass);
        $this->assertEquals('20', $class->easingFunctionSpring->stiffness);
        $this->assertEquals('30', $class->easingFunctionSpring->damping);
    }
    public function testWithMinData(): void
    {
        $class = new EasingType(['type' => 'EASE_OUT']);
        $this->assertEquals('EASE_OUT', $class->type->value);
        $this->assertNull($class->easingFunctionCubicBezier);
        $this->assertNull($class->easingFunctionSpring);
    }
    public function testInvalidType(): void
    {
        $this->expectException(TypeError::class);
         new EasingType(['type' => 'aa']);
    }
    public function testInvalidEasingFunctionCubicBezier(): void
    {
        $this->expectException(TypeError::class);
        new EasingType([
            'type' => 'EASE_OUT',
            'easingFunctionCubicBezier' => ['a' => 1],
        ]);
    }
    public function testInvalidEasingFunctionSpring(): void
    {
        $this->expectException(TypeError::class);
        new EasingType([
            'type' => 'EASE_OUT',
            'easingFunctionSpring' => ['a' => 1],
        ]);
    }
}
