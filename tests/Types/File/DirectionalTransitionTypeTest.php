<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\DirectionalTransitionType;
use Turker\FigmaAPI\Types\File\EasingType;
use TypeError;

final class DirectionalTransitionTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new DirectionalTransitionType([
            'type' => 'MOVE_IN',
            'direction' => 'RIGHT',
            'matchLayers' => true,
            'duration' => 30,
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
        $this->assertInstanceOf(EasingType::class, $class->easing);
        $this->assertEquals('30', $class->duration);
        $this->assertEquals('MOVE_IN', $class->type);
        $this->assertEquals('RIGHT', $class->direction);
        $this->assertTrue($class->matchLayers);
        $this->assertEquals('EASE_OUT', $class->easing->type);
        $this->assertEquals('1', $class->easing->easingFunctionCubicBezier->x1);
        $this->assertEquals('2', $class->easing->easingFunctionCubicBezier->x2);
        $this->assertEquals('3', $class->easing->easingFunctionCubicBezier->y1);
        $this->assertEquals('4', $class->easing->easingFunctionCubicBezier->y2);
        $this->assertEquals('10', $class->easing->easingFunctionSpring->mass);
        $this->assertEquals('20', $class->easing->easingFunctionSpring->stiffness);
        $this->assertEquals('30', $class->easing->easingFunctionSpring->damping);
    }
    public function testWithMinData()
    {
        $class = new DirectionalTransitionType([
            'type' => 'MOVE_IN',
            'direction' => 'RIGHT'
        ]);
        $this->assertNull($class->easing);
        $this->assertNull($class->duration);
        $this->assertFalse($class->matchLayers);
        $this->assertEquals('MOVE_IN', $class->type);
        $this->assertEquals('RIGHT', $class->direction);
    }
    public function testInvalidType(): void
    {
        $class = new DirectionalTransitionType([
            'type' => 'a',
            'direction' => 'RIGHT'
        ]);
        $this->assertNull($class->type);
    }
    public function testInvalidDirection(): void
    {
        $class = new DirectionalTransitionType([
            'type' => 'MOVE_IN',
            'direction' => 'a'
        ]);
        $this->assertNull($class->direction);
    }
    public function testInvalidMatchLayers(): void
    {
        $class = new DirectionalTransitionType([
            'type' => 'MOVE_IN',
            'direction' => 'RIGHT',
            'matchLayers' => 'RIGHT',
        ]);
        $this->assertFalse($class->matchLayers);
    }
}
