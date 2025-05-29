<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\PaintType;
use TypeError;

final class PaintTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new PaintType([
            'visible' => false,
            'color' => ['r' => 15, 'g' => 25, 'b' => 35, 'a' => 45],
            'blendMode' => 'MULTIPLY',
            'opacity' => 20,
            'boundVariables' => [['id' => 'id', 'type' => 'type']],
            'type' => 'GRADIENT_RADIAL',
            'scaleMode' => 'TILE',
            'imageRef' => 'imageRef',
            'gifRef' => 'gifRef',
            'imageTransform' => '9,8,7,6,5,4,3,2,1',
            'scalingFactor' => 5,
            'rotation' => 5,
            'gradientHandlePositions' => [['x' => 10, 'y' => 5]],
            'gradientStops' => [[
                'position' => 10,
                'color' => ['r' => 1, 'g' => 2, 'b' => 3, 'a' => 4],
                'boundVariables' => [['id' => 'id', 'type' => 'type']]
            ]],
            'filters' => [[
                'exposure' => 1,
                'contrast' => 2,
                'saturation' => 3,
                'temperature' => 4,
                'tint' => 5,
                'highlights' => 6,
                'shadows' => 7,
            ]],
        ]);
        $this->assertFalse($class->visible);
        $this->assertEquals('15', $class->color->r);
        $this->assertEquals('25', $class->color->g);
        $this->assertEquals('35', $class->color->b);
        $this->assertEquals('45', $class->color->a);
        $this->assertEquals('MULTIPLY', $class->blendMode->value);
        $this->assertEquals('20', $class->opacity);
        $this->assertEquals('id', $class->boundVariables[0]->id);
        $this->assertEquals('type', $class->boundVariables[0]->type);
        $this->assertEquals('GRADIENT_RADIAL', $class->type->value);
        $this->assertEquals('TILE', $class->scaleMode->value);
        $this->assertEquals('imageRef', $class->imageRef);
        $this->assertEquals('gifRef', $class->gifRef);
        $this->assertEquals('9', $class->imageTransform[0][0]);
        $this->assertEquals('5', $class->scalingFactor);
        $this->assertEquals('5', $class->rotation);
        $this->assertEquals('10', $class->gradientHandlePositions[0]->x);
        $this->assertEquals('5', $class->gradientHandlePositions[0]->y);
        $this->assertEquals('10', $class->gradientStops[0]->position);
        $this->assertEquals('1', $class->gradientStops[0]->color->r);
        $this->assertEquals('2', $class->gradientStops[0]->color->g);
        $this->assertEquals('3', $class->gradientStops[0]->color->b);
        $this->assertEquals('4', $class->gradientStops[0]->color->a);
        $this->assertEquals('id', $class->gradientStops[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->gradientStops[0]->boundVariables[0]->type);
        $this->assertEquals('1', $class->filters[0]->exposure);
        $this->assertEquals('2', $class->filters[0]->contrast);
        $this->assertEquals('3', $class->filters[0]->saturation);
        $this->assertEquals('4', $class->filters[0]->temperature);
        $this->assertEquals('5', $class->filters[0]->tint);
        $this->assertEquals('6', $class->filters[0]->highlights);
        $this->assertEquals('7', $class->filters[0]->shadows);
    }
    public function testWithMinData(): void
    {
        $class = new PaintType([
            'type' => 'GRADIENT_RADIAL',
            'scalingFactor' => 5,
            'rotation' => 5
        ]);
        $this->assertEquals('GRADIENT_RADIAL', $class->type->value);
        $this->assertEquals('5', $class->scalingFactor);
        $this->assertEquals('5', $class->rotation);
        $this->assertEquals('1', $class->opacity);
        $this->assertTrue($class->visible);
        $this->assertNull($class->color);
        $this->assertNull($class->blendMode);
        $this->assertNull($class->boundVariables);
        $this->assertNull($class->scaleMode);
        $this->assertNull($class->imageRef);
        $this->assertNull($class->gifRef);
        $this->assertNull($class->imageTransform);
        $this->assertNull($class->gradientHandlePositions);
        $this->assertNull($class->gradientStops);
        $this->assertNull($class->filters);
    }
    public function testInvalidFilters()
    {
        $class = new PaintType([
            'type' => 'GRADIENT_RADIAL',
            'scalingFactor' => 5,
            'rotation' => 5,
            'filters' => 5,
        ]);
        $this->assertNull($class->gradientHandlePositions);
    }
    public function testInvalidGradientHandlePositions()
    {
        $class = new PaintType([
            'type' => 'GRADIENT_RADIAL',
            'scalingFactor' => 5,
            'rotation' => 5,
            'gradientHandlePositions' => 5,
        ]);
        $this->assertNull($class->gradientHandlePositions);
    }
    public function testInvalidGradientStops()
    {
        $class = new PaintType([
            'type' => 'GRADIENT_RADIAL',
            'scalingFactor' => 5,
            'rotation' => 5,
            'gradientStops' => 5,
        ]);
        $this->assertNull($class->gradientStops);
    }
    public function testInvalidImageTransform()
    {
        $this->expectException(TypeError::class);
        new PaintType([
            'type' => 'GRADIENT_RADIAL',
            'scalingFactor' => 5,
            'rotation' => 5,
            'imageTransform' => 5,
        ]);
    }
    public function testInvalidGifRef()
    {
        $this->expectException(TypeError::class);
        new PaintType([
            'type' => 'GRADIENT_RADIAL',
            'scalingFactor' => 5,
            'rotation' => 5,
            'gifRef' => 5,
        ]);
    }
    public function testInvalidImageRef()
    {
        $this->expectException(TypeError::class);
        new PaintType([
            'type' => 'GRADIENT_RADIAL',
            'scalingFactor' => 5,
            'rotation' => 5,
            'imageRef' => 5,
        ]);
    }
    public function testInvalidScaleMode()
    {
        $class = new PaintType([
            'type' => 'GRADIENT_RADIAL',
            'scalingFactor' => 5,
            'rotation' => 5,
            'scaleMode' => 'scaleMode',
        ]);
        $this->assertNull($class->scaleMode);
    }
    public function testInvalidRotation()
    {
        $class = new PaintType([
            'type' => 'GRADIENT_RADIAL',
            'scalingFactor' => 5,
            'rotation' => 'a'
        ]);
        $this->assertNull($class->rotation);
    }
    public function testInvalidScalingFactor()
    {
        $class = new PaintType([
            'type' => 'GRADIENT_RADIAL',
            'scalingFactor' => 'scalingFactor',
            'rotation' => 5,
        ]);
        $this->assertNull($class->scalingFactor);
    }
}
