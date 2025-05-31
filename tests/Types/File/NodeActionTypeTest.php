<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\NodeActionType;
use TypeError;

final class NodeActionTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new NodeActionType([
            'type' => 'type',
            'destinationId' => 'destinationId',
            'resetInteractiveComponents' => true,
            'resetScrollPosition' => true,
            'resetVideoPosition' => true,
            'preserveScrollPosition' => true,
            'overlayRelativePosition' => ['x' => 5,'y' => 4],
            'navigation' => ['type' => 'OVERLAY'],
            'transition' => [
                'type' => 'MOVE_OUT',
                'direction' => 'RIGHT',
                'matchLayers' => true,
                'duration' => 20,
                'easing' => [
                    'type' => 'EASE_OUT',
                    'easingFunctionCubicBezier' => ['x1' => 1,'x2' => 2,'y1' => 3,'y2' => 4],
                    'easingFunctionSpring' => [
                        'mass' => 10,
                        'stiffness' => 20,
                        'damping' => 30,
                    ],
                ],
            ]
        ]);
        $this->assertEquals('type', $class->type);
        $this->assertEquals('destinationId', $class->destinationId);
        $this->assertTrue($class->resetInteractiveComponents);
        $this->assertTrue($class->resetScrollPosition);
        $this->assertTrue($class->resetVideoPosition);
        $this->assertTrue($class->preserveScrollPosition);
        $this->assertEquals('5', $class->overlayRelativePosition->x);
        $this->assertEquals('4', $class->overlayRelativePosition->y);
        $this->assertEquals('OVERLAY', $class->navigation->type);
        $this->assertEquals('MOVE_OUT', $class->transition->type);
        $this->assertEquals('RIGHT', $class->transition->direction);
        $this->assertTrue($class->transition->matchLayers);
        $this->assertEquals('20', $class->transition->duration);
        $this->assertEquals('EASE_OUT', $class->transition->easing->type);
        $this->assertEquals('1', $class->transition->easing->easingFunctionCubicBezier->x1);
        $this->assertEquals('2', $class->transition->easing->easingFunctionCubicBezier->x2);
        $this->assertEquals('3', $class->transition->easing->easingFunctionCubicBezier->y1);
        $this->assertEquals('4', $class->transition->easing->easingFunctionCubicBezier->y2);
        $this->assertEquals('10', $class->transition->easing->easingFunctionSpring->mass);
        $this->assertEquals('20', $class->transition->easing->easingFunctionSpring->stiffness);
        $this->assertEquals('30', $class->transition->easing->easingFunctionSpring->damping);
    }
    public function testWithMinData(): void
    {
        $class = new NodeActionType(['type' => 'type']);
        $this->assertEquals('type', $class->type);
        $this->assertNull($class->destinationId);
        $this->assertFalse($class->resetInteractiveComponents);
        $this->assertFalse($class->resetScrollPosition);
        $this->assertFalse($class->resetVideoPosition);
        $this->assertFalse($class->preserveScrollPosition);
        $this->assertNull($class->overlayRelativePosition);
        $this->assertNull($class->navigation);
        $this->assertNull($class->transition);
    }
    public function testInvalidResetInteractiveComponents(): void
    {
        $class = new NodeActionType(['type' => 'type','resetInteractiveComponents' => 5]);
        $this->assertFalse($class->resetInteractiveComponents);
    }
    public function testInvalidResetScrollPosition(): void
    {
        $class = new NodeActionType(['type' => 'type','resetScrollPosition' => 5]);
        $this->assertFalse($class->resetScrollPosition);
    }
    public function testInvalidResetVideoPosition(): void
    {
        $class = new NodeActionType(['type' => 'type','resetVideoPosition' => 5]);
        $this->assertFalse($class->resetVideoPosition);
    }
    public function testInvalidPreserveScrollPosition(): void
    {
        $class = new NodeActionType(['type' => 'type','preserveScrollPosition' => 5]);
        $this->assertFalse($class->preserveScrollPosition);
    }
    public function testInvalidOverlayRelativePosition(): void
    {
        $class = new NodeActionType(['type' => 'type','overlayRelativePosition' => 5]);
        $this->assertNull($class->overlayRelativePosition);
    }
    public function testInvalidNavigation(): void
    {
        $class = new NodeActionType(['type' => 'type','navigation' => 5]);
        $this->assertNull($class->navigation);
    }
    public function testInvalidTransition(): void
    {
        $class = new NodeActionType(['type' => 'type','transition' => 5]);
        $this->assertNull($class->transition);
    }
}
