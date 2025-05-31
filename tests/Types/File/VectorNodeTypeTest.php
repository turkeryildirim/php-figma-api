<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Common\VectorType;
use Turker\FigmaAPI\Types\File\EasingType;
use Turker\FigmaAPI\Types\File\EffectType;
use Turker\FigmaAPI\Types\File\PaintOverrideType;
use Turker\FigmaAPI\Types\File\PaintType;
use Turker\FigmaAPI\Types\File\PathType;
use Turker\FigmaAPI\Types\File\RectangleType;
use Turker\FigmaAPI\Types\File\StyleType;
use Turker\FigmaAPI\Types\File\VectorNodeType;
use TypeError;

final class VectorNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new VectorNodeType([
            'id' => 'id',
            'locked' => true,
            'preserveRatio' => true,
            'isMask' => true,
            'opacity' => 20,
            'layoutGrow' => 20,
            'transitionDuration' => 20,
            'transitionNodeID' => 'transitionNodeID',
            'size' => ['x' => 5,'y' => 4],
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
            'strokeDashes' => [33,44],
            'strokeCap' => 'SQUARE',
            'strokeJoin' => 'BEVEL',
            'strokeAlign' => 'OUTSIDE',
            'relativeTransform' => '1,2,3,4,5,6,7,8,9',
            'blendMode' => 'NORMAL',
            'layoutAlign' => 'CENTER',
            'constraints' => ['vertical' => 'BOTTOM'],
            'transitionEasing' => [
                'type' => 'EASE_OUT',
                'easingFunctionCubicBezier' => ['x1' => 1,'x2' => 2,'y1' => 3,'y2' => 4],
                'easingFunctionSpring' => [
                    'mass' => 10,
                    'stiffness' => 20,
                    'damping' => 30,
                ],
            ],
            'absoluteBoundingBox' => ['width' => 10, 'height' => 10, 'x' => 1, 'y' => 2],
            'absoluteRenderBounds' => ['width' => 10, 'height' => 10, 'x' => 1, 'y' => 2],
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
            'fills' => [[
                'visible' => false,
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
            'styles' => [[
                'key' => 'key',
                'name' => 'name',
                'remote' => false,
                'description' => 'description',
                'style_type' => 'GRID',
            ]],
            'fillGeometry' => [[
                'path' => 'path',
                'windingRule' => 'windingRule',
                'overrideID' => 5,
            ]],
            'fillOverrideTable' => [[
                'inheritFillStyleId' => 'inheritFillStyleId',
                'fills' => [[
                    'visible' => false,
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
            ]],
            'individualStrokeWeights' => [
                'top' => 1,
                'right' => 2,
                'bottom' => 3,
                'left' => 4,
            ],
            'strokeMiterAngle' => 10,
            'strokeGeometry' => [[
                'path' => 'path',
                'windingRule' => 'windingRule',
                'overrideID' => 6,
            ]]
        ]);

        $this->assertInstanceOf(VectorType::class, $class->size);
        $this->assertInstanceOf(RectangleType::class, $class->absoluteBoundingBox);
        $this->assertInstanceOf(RectangleType::class, $class->absoluteRenderBounds);
        $this->assertInstanceOf(EasingType::class, $class->transitionEasing);
        $this->assertInstanceOf(EffectType::class, $class->effects[0]);
        $this->assertInstanceOf(PaintType::class, $class->fills[0]);
        $this->assertInstanceOf(StyleType::class, $class->styles[0]);
        $this->assertInstanceOf(PaintType::class, $class->strokes[0]);
        $this->assertInstanceOf(PathType::class, $class->fillGeometry[0]);
        $this->assertInstanceOf(PathType::class, $class->strokeGeometry[0]);
        $this->assertInstanceOf(PaintOverrideType::class, $class->fillOverrideTable[0]);

        $this->assertEquals('id', $class->id);
        $this->assertTrue($class->locked);
        $this->assertTrue($class->preserveRatio);
        $this->assertTrue($class->isMask);
        $this->assertEquals('10', $class->strokeMiterAngle);
        $this->assertEquals('20', $class->opacity);
        $this->assertEquals('20', $class->layoutGrow);
        $this->assertEquals('20', $class->transitionDuration);
        $this->assertEquals('transitionNodeID', $class->transitionNodeID);
        $this->assertEquals('5', $class->size->x);
        $this->assertEquals('4', $class->size->y);
        $this->assertEquals('20', $class->strokeWeight);
        $this->assertEquals('33', $class->strokeDashes[0]);
        $this->assertEquals('SQUARE', $class->strokeCap);
        $this->assertEquals('BEVEL', $class->strokeJoin);
        $this->assertEquals('OUTSIDE', $class->strokeAlign);
        $this->assertEquals('2', $class->relativeTransform[0][1]);
        $this->assertEquals('NORMAL', $class->blendMode);
        $this->assertEquals('CENTER', $class->layoutAlign);
        $this->assertEquals('BOTTOM', $class->constraints->vertical);
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

        $this->assertFalse($class->fills[0]->visible);
        $this->assertEquals('15', $class->fills[0]->color->r);
        $this->assertEquals('25', $class->fills[0]->color->g);
        $this->assertEquals('35', $class->fills[0]->color->b);
        $this->assertEquals('45', $class->fills[0]->color->a);
        $this->assertEquals('MULTIPLY', $class->fills[0]->blendMode);
        $this->assertEquals('id', $class->fills[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->fills[0]->boundVariables[0]->type);
        $this->assertEquals('GRADIENT_LINEAR', $class->fills[0]->type);
        $this->assertEquals('4', $class->fills[0]->gradientHandlePositions[0]->x);
        $this->assertEquals('3', $class->fills[0]->gradientHandlePositions[0]->y);
        $this->assertEquals('10', $class->fills[0]->gradientStops[0]->position);
        $this->assertEquals('1', $class->fills[0]->gradientStops[0]->color->r);
        $this->assertEquals('2', $class->fills[0]->gradientStops[0]->color->g);
        $this->assertEquals('3', $class->fills[0]->gradientStops[0]->color->b);
        $this->assertEquals('4', $class->fills[0]->gradientStops[0]->color->a);
        $this->assertEquals('id', $class->fills[0]->gradientStops[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->fills[0]->gradientStops[0]->boundVariables[0]->type);
        $this->assertEquals('TILE', $class->fills[0]->scaleMode);
        $this->assertEquals('9', $class->fills[0]->imageTransform[0][0]);
        $this->assertEquals('26', $class->fills[0]->scalingFactor);
        $this->assertEquals('19', $class->fills[0]->rotation);
        $this->assertEquals('imageRef', $class->fills[0]->imageRef);
        $this->assertEquals('gifRef', $class->fills[0]->gifRef);
        $this->assertEquals('1', $class->fills[0]->filters[0]->exposure);
        $this->assertEquals('2', $class->fills[0]->filters[0]->contrast);
        $this->assertEquals('3', $class->fills[0]->filters[0]->saturation);
        $this->assertEquals('4', $class->fills[0]->filters[0]->temperature);
        $this->assertEquals('5', $class->fills[0]->filters[0]->tint);
        $this->assertEquals('6', $class->fills[0]->filters[0]->highlights);
        $this->assertEquals('7', $class->fills[0]->filters[0]->shadows);

        $this->assertEquals('key', $class->styles[0]->key);
        $this->assertEquals('name', $class->styles[0]->name);
        $this->assertEquals('description', $class->styles[0]->description);

        $this->assertFalse($class->styles[0]->remote);
        $this->assertEquals('GRID', $class->styles[0]->styleType);

        $this->assertEquals('EASE_OUT', $class->transitionEasing->type);
        $this->assertEquals('1', $class->transitionEasing->easingFunctionCubicBezier->x1);
        $this->assertEquals('2', $class->transitionEasing->easingFunctionCubicBezier->x2);
        $this->assertEquals('3', $class->transitionEasing->easingFunctionCubicBezier->y1);
        $this->assertEquals('4', $class->transitionEasing->easingFunctionCubicBezier->y2);
        $this->assertEquals('10', $class->transitionEasing->easingFunctionSpring->mass);
        $this->assertEquals('20', $class->transitionEasing->easingFunctionSpring->stiffness);
        $this->assertEquals('30', $class->transitionEasing->easingFunctionSpring->damping);

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

        $this->assertEquals('path', $class->fillGeometry[0]->path);
        $this->assertEquals('windingRule', $class->fillGeometry[0]->windingRule);
        $this->assertEquals('5', $class->fillGeometry[0]->overrideID);

        $this->assertEquals('path', $class->strokeGeometry[0]->path);
        $this->assertEquals('windingRule', $class->strokeGeometry[0]->windingRule);
        $this->assertEquals('6', $class->strokeGeometry[0]->overrideID);

        $this->assertEquals('1', $class->individualStrokeWeights->top);
        $this->assertEquals('2', $class->individualStrokeWeights->right);
        $this->assertEquals('3', $class->individualStrokeWeights->bottom);
        $this->assertEquals('4', $class->individualStrokeWeights->left);

        $this->assertEquals('inheritFillStyleId', $class->fillOverrideTable[0]->inheritFillStyleId);
        $this->assertFalse($class->fillOverrideTable[0]->fills[0]->visible);
        $this->assertEquals('15', $class->fillOverrideTable[0]->fills[0]->color->r);
        $this->assertEquals('25', $class->fillOverrideTable[0]->fills[0]->color->g);
        $this->assertEquals('35', $class->fillOverrideTable[0]->fills[0]->color->b);
        $this->assertEquals('45', $class->fillOverrideTable[0]->fills[0]->color->a);
        $this->assertEquals('MULTIPLY', $class->fillOverrideTable[0]->fills[0]->blendMode);
        $this->assertEquals('id', $class->fillOverrideTable[0]->fills[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->fillOverrideTable[0]->fills[0]->boundVariables[0]->type);
        $this->assertEquals('GRADIENT_LINEAR', $class->fillOverrideTable[0]->fills[0]->type);
        $this->assertEquals('4', $class->fillOverrideTable[0]->fills[0]->gradientHandlePositions[0]->x);
        $this->assertEquals('3', $class->fillOverrideTable[0]->fills[0]->gradientHandlePositions[0]->y);
        $this->assertEquals('10', $class->fillOverrideTable[0]->fills[0]->gradientStops[0]->position);
        $this->assertEquals('1', $class->fillOverrideTable[0]->fills[0]->gradientStops[0]->color->r);
        $this->assertEquals('2', $class->fillOverrideTable[0]->fills[0]->gradientStops[0]->color->g);
        $this->assertEquals('3', $class->fillOverrideTable[0]->fills[0]->gradientStops[0]->color->b);
        $this->assertEquals('4', $class->fillOverrideTable[0]->fills[0]->gradientStops[0]->color->a);
        $this->assertEquals('id', $class->fillOverrideTable[0]->fills[0]->gradientStops[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->fillOverrideTable[0]->fills[0]->gradientStops[0]->boundVariables[0]->type);
        $this->assertEquals('TILE', $class->fillOverrideTable[0]->fills[0]->scaleMode);
        $this->assertEquals('9', $class->fillOverrideTable[0]->fills[0]->imageTransform[0][0]);
        $this->assertEquals('26', $class->fillOverrideTable[0]->fills[0]->scalingFactor);
        $this->assertEquals('19', $class->fillOverrideTable[0]->fills[0]->rotation);
        $this->assertEquals('imageRef', $class->fillOverrideTable[0]->fills[0]->imageRef);
        $this->assertEquals('gifRef', $class->fillOverrideTable[0]->fills[0]->gifRef);
        $this->assertEquals('1', $class->fillOverrideTable[0]->fills[0]->filters[0]->exposure);
        $this->assertEquals('2', $class->fillOverrideTable[0]->fills[0]->filters[0]->contrast);
        $this->assertEquals('3', $class->fillOverrideTable[0]->fills[0]->filters[0]->saturation);
        $this->assertEquals('4', $class->fillOverrideTable[0]->fills[0]->filters[0]->temperature);
        $this->assertEquals('5', $class->fillOverrideTable[0]->fills[0]->filters[0]->tint);
        $this->assertEquals('6', $class->fillOverrideTable[0]->fills[0]->filters[0]->highlights);
        $this->assertEquals('7', $class->fillOverrideTable[0]->fills[0]->filters[0]->shadows);
    }
    public function testWithMinData(): void
    {
        $class = new VectorNodeType(['id' => 'id', 'layoutGrow' => 10]);
        $this->assertEquals('id', $class->id);
        $this->assertFalse($class->locked);
        $this->assertNull($class->preserveRatio);
        $this->assertFalse($class->isMask);
        $this->assertNull($class->strokeMiterAngle);
        $this->assertEquals('1', $class->opacity);
        $this->assertEquals('10', $class->layoutGrow);
        $this->assertNull($class->transitionDuration);
        $this->assertNull($class->transitionNodeID);
        $this->assertNull($class->size);
        $this->assertNull($class->strokeWeight);
        $this->assertNull($class->strokeDashes);
        $this->assertNull($class->strokeCap);
        $this->assertNull($class->strokeJoin);
        $this->assertNull($class->strokeAlign);
        $this->assertNull($class->relativeTransform);
        $this->assertNull($class->blendMode);
        $this->assertNull($class->layoutAlign);
        $this->assertNull($class->constraints);
        $this->assertNull($class->absoluteBoundingBox);
        $this->assertNull($class->absoluteRenderBounds);
        $this->assertNull($class->effects);
        $this->assertNull($class->fills);
        $this->assertNull($class->styles);
        $this->assertNull($class->transitionEasing);
        $this->assertNull($class->strokes);
        $this->assertNull($class->fillGeometry);
        $this->assertNull($class->strokeGeometry);
        $this->assertNull($class->individualStrokeWeights);
        $this->assertNull($class->fillOverrideTable);
    }
    public function testInvalidLayoutGrow(): void
    {
        $class = new VectorNodeType([
            'id' => 'id',
            'layoutGrow' => 'aa'
        ]);
        $this->assertEquals('0', $class->layoutGrow);
    }
    public function testInvalidFillGeometry(): void
    {
        $val = new VectorNodeType([
            'fillGeometry' => ['a' => 'b'],
            'id' => 'id',
            'layoutGrow' => 10
        ]);
        $this->assertNull($val->fillGeometry);
    }
    public function testInvalidFillOverrideTable(): void
    {
        $val = new VectorNodeType([
            'fillOverrideTable' => ['a' => 'b'],
            'id' => 'id',
            'layoutGrow' => 10
        ]);
        $this->assertNull($val->fillOverrideTable);
    }
    public function testInvalidIndividualStrokeWeights(): void
    {
        $class = new VectorNodeType([
            'individualStrokeWeights' => ['a' => 'b'],
            'id' => 'id',
            'layoutGrow' => 10
        ]);
        $this->assertNull($class->individualStrokeWeights);
    }
    public function testInvalidStrokeMiterAngle(): void
    {
        $this->expectException(TypeError::class);
        new VectorNodeType([
            'strokeMiterAngle' => ['a' => 'b'],
            'id' => 'id',
            'layoutGrow' => 10
        ]);
    }
    public function testInvalidStrokeGeometry(): void
    {
        $val = new VectorNodeType([
            'strokeGeometry' => ['a' => 'b'],
            'id' => 'id',
            'layoutGrow' => 10
        ]);
        $this->assertNull($val->strokeGeometry);
    }
}
