<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\TableNodeType;

final class TableNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new TableNodeType([
            'id' => 'id',
            'absoluteBoundingBox' => ['width' => 10, 'height' => 10, 'x' => 1, 'y' => 2],
            'absoluteRenderBounds' => ['width' => 10, 'height' => 10, 'x' => 1, 'y' => 2],
            'relativeTransform' => '1,2,3,4,5,6,7,8,9',
            'size' => ['x' => 5,'y' => 4],
            'blendMode' => 'MULTIPLY',
            'constraints' => ['vertical' => 'BOTTOM'],
            'strokes' => [[
                'visible' => true,
                'color' => ['r' => 15, 'g' => 25, 'b' => 35, 'a' => 45],
                'blendMode' => 'MULTIPLY',
                'opacity' => 7,
                'boundVariables' => [['id' => 'id', 'type' => 'type']],
                'type' => 'GRADIENT_LINEAR',
                'gradientHandlePositions' => [['x' => 4, 'y' => 3]],
                'gradientStops' => [[
                    'position' => 10,
                    'color' => ['r' => 1, 'g' => 2, 'b' => 3, 'a' => 4],
                    'boundVariables' => [['id' => 'id', 'type' => 'type']]
                ]],
                'scaleMode' => 'TILE',
                'imageTransform' => '9,8,7,6,5,4,3,2,1',
                'scalingFactor' => 26,
                'rotation' => 19,
                'imageRef' => 'imageRef',
                'gifRef' => 'gifRef',
                'filters' => [[
                    'exposure' => 1,
                    'contrast' => 2,
                    'saturation' => 3,
                    'temperature' => 4,
                    'tint' => 5,
                    'highlights' => 6,
                    'shadows' => 7,
                ]],
            ]],
            'strokeWeight' => 20,
            'strokeAlign' => 'OUTSIDE',
            'effects' => [[
                'visible' => true,
                'color' => ['r' => 10, 'g' => 20, 'b' => 30, 'a' => 40],
                'blendMode' => 'DARKEN',
                'boundVariables' => [['id' => 'id', 'type' => 'type']],
                'type' => 'INNER_SHADOW',
                'radius' => 55,
                'showShadowBehindNode' => true,
                'offset' => ['x' => 5,'y' => 4],
                'spread' => 20,
            ]],
        ]);
        $this->assertEquals('20', $class->strokeWeight);
        $this->assertEquals('OUTSIDE', $class->strokeAlign);
        $this->assertEquals('2', $class->relativeTransform[0][1]);
        $this->assertEquals('MULTIPLY', $class->blendMode);
        $this->assertEquals('BOTTOM', $class->constraints->vertical);
        $this->assertEquals('id', $class->id);
        $this->assertEquals('5', $class->size->x);
        $this->assertEquals('4', $class->size->y);
        $this->assertEquals('1', $class->absoluteBoundingBox->x);
        $this->assertEquals('2', $class->absoluteBoundingBox->y);
        $this->assertEquals('10', $class->absoluteBoundingBox->width);
        $this->assertEquals('10', $class->absoluteBoundingBox->height);
        $this->assertEquals('1', $class->absoluteRenderBounds->x);
        $this->assertEquals('2', $class->absoluteRenderBounds->y);
        $this->assertEquals('10', $class->absoluteRenderBounds->width);
        $this->assertEquals('10', $class->absoluteRenderBounds->height);

        $this->assertTrue($class->effects[0]->visible);
        $this->assertEquals('10', $class->effects[0]->color->r);
        $this->assertEquals('20', $class->effects[0]->color->g);
        $this->assertEquals('30', $class->effects[0]->color->b);
        $this->assertEquals('40', $class->effects[0]->color->a);
        $this->assertEquals('DARKEN', $class->effects[0]->blendMode);
        $this->assertEquals('id', $class->effects[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->effects[0]->boundVariables[0]->type);
        $this->assertEquals('INNER_SHADOW', $class->effects[0]->type);
        $this->assertEquals('55', $class->effects[0]->radius);
        $this->assertTrue($class->effects[0]->showShadowBehindNode);
        $this->assertEquals('5', $class->effects[0]->offset->x);
        $this->assertEquals('4', $class->effects[0]->offset->y);
        $this->assertEquals('20', $class->effects[0]->spread);

        $this->assertEquals('GRADIENT_LINEAR', $class->strokes[0]->type);
        $this->assertEquals('7', $class->strokes[0]->opacity);
        $this->assertTrue($class->strokes[0]->visible);
        $this->assertEquals('15', $class->strokes[0]->color->r);
        $this->assertEquals('25', $class->strokes[0]->color->g);
        $this->assertEquals('35', $class->strokes[0]->color->b);
        $this->assertEquals('45', $class->strokes[0]->color->a);
        $this->assertEquals('type', $class->strokes[0]->boundVariables[0]->type);
        $this->assertEquals('id', $class->strokes[0]->boundVariables[0]->id);
        $this->assertEquals('4', $class->strokes[0]->gradientHandlePositions[0]->x);
        $this->assertEquals('3', $class->strokes[0]->gradientHandlePositions[0]->y);
        $this->assertEquals('10', $class->strokes[0]->gradientStops[0]->position);
        $this->assertEquals('1', $class->strokes[0]->gradientStops[0]->color->r);
        $this->assertEquals('2', $class->strokes[0]->gradientStops[0]->color->g);
        $this->assertEquals('3', $class->strokes[0]->gradientStops[0]->color->b);
        $this->assertEquals('4', $class->strokes[0]->gradientStops[0]->color->a);
        $this->assertEquals('type', $class->strokes[0]->gradientStops[0]->boundVariables[0]->type);
        $this->assertEquals('id', $class->strokes[0]->gradientStops[0]->boundVariables[0]->id);
        $this->assertEquals('TILE', $class->strokes[0]->scaleMode);
        $this->assertEquals('9', $class->strokes[0]->imageTransform[0][0]);
        $this->assertEquals('26', $class->strokes[0]->scalingFactor);
        $this->assertEquals('19', $class->strokes[0]->rotation);
        $this->assertEquals('imageRef', $class->strokes[0]->imageRef);
        $this->assertEquals('gifRef', $class->strokes[0]->gifRef);
        $this->assertEquals('1', $class->strokes[0]->filters[0]->exposure);
        $this->assertEquals('2', $class->strokes[0]->filters[0]->contrast);
        $this->assertEquals('3', $class->strokes[0]->filters[0]->saturation);
        $this->assertEquals('4', $class->strokes[0]->filters[0]->temperature);
        $this->assertEquals('5', $class->strokes[0]->filters[0]->tint);
        $this->assertEquals('6', $class->strokes[0]->filters[0]->highlights);
        $this->assertEquals('7', $class->strokes[0]->filters[0]->shadows);
    }
    public function testWithMinData(): void
    {
        $class = new TableNodeType(['id' => 'id']);
        $this->assertEquals('id', $class->id);
        $this->assertNull($class->absoluteBoundingBox);
        $this->assertNull($class->absoluteRenderBounds);
        $this->assertNull($class->blendMode);
        $this->assertNull($class->constraints);
        $this->assertNull($class->effects);
        $this->assertNull($class->relativeTransform);
        $this->assertNull($class->size);
        $this->assertNull($class->strokes);
        $this->assertNull($class->strokeAlign);
        $this->assertNull($class->strokeWeight);
    }
}
