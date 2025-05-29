<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\SimpleTransitionType;
use TypeError;

final class SimpleTransitionTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new SimpleTransitionType([
            'duration' => 10,
            'type' => 'SMART_ANIMATE',
            'easing' => [
                'type' => 'EASE_OUT',
                'easingFunctionCubicBezier' => ['x1' => 1,'x2' => 2,'y1' => 3,'y2' => 4],
                'easingFunctionSpring' => [
                    'mass' => 10,
                    'stiffness' => 20,
                    'damping' => 30,
                ],
            ],
        ]);
        $this->assertEquals('10', $class->duration);
        $this->assertEquals('SMART_ANIMATE', $class->type->value);
        $this->assertEquals('EASE_OUT', $class->easing->type->value);
        $this->assertEquals('1', $class->easing->easingFunctionCubicBezier->x1);
        $this->assertEquals('2', $class->easing->easingFunctionCubicBezier->x2);
        $this->assertEquals('3', $class->easing->easingFunctionCubicBezier->y1);
        $this->assertEquals('4', $class->easing->easingFunctionCubicBezier->y2);
        $this->assertEquals('10', $class->easing->easingFunctionSpring->mass);
        $this->assertEquals('20', $class->easing->easingFunctionSpring->stiffness);
        $this->assertEquals('30', $class->easing->easingFunctionSpring->damping);
    }
    public function testWithMinData(): void
    {
        $class = new SimpleTransitionType(['type' => 'SMART_ANIMATE']);
        $this->assertNull($class->duration);
        $this->assertNull($class->easing);
        $this->assertEquals('SMART_ANIMATE', $class->type->value);
    }
    public function testInvalidType(): void
    {
        $this->expectException(TypeError::class);
        new SimpleTransitionType(['type' => 'type']);
    }
}
