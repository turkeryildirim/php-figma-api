<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\FrameNodeType;
use TypeError;
use ValueError;

final class FrameNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new FrameNodeType([
            'id' => 'id',
            'isMask' => true,
            'locked' => true,
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
            'strokeAlign' => 'OUTSIDE',
            'cornerRadius' => 10,
            'cornerSmoothing' => 15,
            'rectangleCornerRadii' => [5,6],
            'blendMode' => 'NORMAL',
            'preserveRatio' => true,
            'constraints' => ['vertical' => 'BOTTOM'],
            'layoutAlign' => 'CENTER',
            'transitionDuration' => 20,
            'transitionNodeID' => 'transitionNodeID',
            'transitionEasing' => [
                'type' => 'EASE_OUT',
                'easingFunctionCubicBezier' => ['x1' => 1,'x2' => 2,'y1' => 3,'y2' => 4],
                'easingFunctionSpring' => [
                    'mass' => 10,
                    'stiffness' => 20,
                    'damping' => 30,
                ],
            ],
            'opacity' => 20,
            'absoluteBoundingBox' => ['width' => 10, 'height' => 10, 'x' => 1, 'y' => 2],
            'absoluteRenderBounds' => ['width' => 10, 'height' => 10, 'x' => 1, 'y' => 2],
            'size' => ['x' => 5,'y' => 4],
            'relativeTransform' => '1,2,3,4,5,6,7,8,9',
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
            'styles' => [[
                'key' => 'key',
                'name' => 'name',
                'remote' => false,
                'description' => 'description',
                'style_type' => 'GRID',
            ]],
            'devStatus' => [
                'type' => 'READY_FOR_DEV',
                'description' => 'description'
            ],

            'minWidth' => 10,
            'maxWidth' => 10,
            'minHeight' => 10,
            'maxHeight' => 10,
            'paddingLeft' => 10,
            'paddingRight' => 10,
            'paddingTop' => 10,
            'paddingBottom' => 10,
            'horizontalPadding' => 10,
            'verticalPadding' => 10,
            'itemSpacing' => 10,
            'counterAxisSpacing' => 10,
            'isMaskOutline' => true,
            'clipsContent' => true,
            'itemReverseZIndex' => true,
            'strokesIncludedInLayout' => true,
            'overflowDirection' => 'HORIZONTAL_SCROLLING',
            'position' => 'ABSOLUTE',
            'counterAxisAlignContent' => 'CENTER',
            'primaryAxisAlignItems' => 'CENTER',
            'layoutMode' => 'HORIZONTAL',
            'primaryAxisSizingMode' => 'FIXED',
            'counterAxisSizingMode' => 'FIXED',
            'maskType' => 'VECTOR',
            'layoutSizingHorizontal' => 'HUG',
            'layoutSizingVertical' => 'HUG',
            'layoutWrap' => 'NO_WRAP',
            'targetAspectRatio' => ['x' => 5,'y' => 5],
            'interactions' => [[
                'trigger' => [
                    'type' => 'ON_HOVER',
                    'timeout' => 10,
                    'delay' => 10,
                    'mediaHitTime' => 10,
                    'deprecatedVersion' => true,
                    'device' => 'XBOX_ONE',
                    'keyCodes' => [1,2],
                ],
                'actions' => [[
                    'type' => 'URL',
                    'url' => 'url'
                ]]
            ]],
            'layoutGrids' => [[
                'count' => 10,
                'offset' => 10,
                'gutterSize' => 10,
                'sectionSize' => 10,
                'pattern' => 'COLUMNS',
                'alignment' => 'CENTER',
            ]]
        ]);
        $this->assertEquals('10', $class->counterAxisSpacing);
        $this->assertEquals('10', $class->itemSpacing);
        $this->assertEquals('10', $class->verticalPadding);
        $this->assertEquals('10', $class->horizontalPadding);
        $this->assertEquals('10', $class->paddingBottom);
        $this->assertEquals('10', $class->paddingTop);
        $this->assertEquals('10', $class->paddingRight);
        $this->assertEquals('10', $class->paddingLeft);
        $this->assertEquals('10', $class->maxHeight);
        $this->assertEquals('10', $class->minHeight);
        $this->assertEquals('10', $class->maxWidth);
        $this->assertEquals('10', $class->minWidth);

        $this->assertTrue($class->strokesIncludedInLayout);
        $this->assertTrue($class->itemReverseZIndex);
        $this->assertTrue($class->clipsContent);
        $this->assertTrue($class->isMaskOutline);
        $this->assertEquals('HORIZONTAL_SCROLLING', $class->overflowDirection->value);
        $this->assertEquals('ABSOLUTE', $class->position->value);
        $this->assertEquals('CENTER', $class->primaryAxisAlignItems->value);
        $this->assertEquals('CENTER', $class->counterAxisAlignContent->value);
        $this->assertEquals('HORIZONTAL', $class->layoutMode->value);
        $this->assertEquals('FIXED', $class->primaryAxisSizingMode->value);
        $this->assertEquals('FIXED', $class->counterAxisSizingMode->value);
        $this->assertEquals('VECTOR', $class->maskType->value);
        $this->assertEquals('HUG', $class->layoutSizingHorizontal->value);
        $this->assertEquals('HUG', $class->layoutSizingVertical->value);
        $this->assertEquals('NO_WRAP', $class->layoutWrap->value);
        $this->assertEquals('5', $class->targetAspectRatio->x);
        $this->assertEquals('5', $class->targetAspectRatio->y);

        $this->assertEquals('10', $class->layoutGrids[0]->count);
        $this->assertEquals('10', $class->layoutGrids[0]->offset);
        $this->assertEquals('10', $class->layoutGrids[0]->gutterSize);
        $this->assertEquals('10', $class->layoutGrids[0]->sectionSize);
        $this->assertEquals('COLUMNS', $class->layoutGrids[0]->pattern->value);
        $this->assertEquals('CENTER', $class->layoutGrids[0]->alignment->value);

        $this->assertEquals('ON_HOVER', $class->interactions[0]->trigger->type->value);
        $this->assertEquals('10', $class->interactions[0]->trigger->timeout);
        $this->assertEquals('10', $class->interactions[0]->trigger->delay);
        $this->assertEquals('10', $class->interactions[0]->trigger->mediaHitTime);
        $this->assertEquals('XBOX_ONE', $class->interactions[0]->trigger->device->value);
        $this->assertEquals('1', $class->interactions[0]->trigger->keyCodes[0]);
        $this->assertTrue($class->interactions[0]->trigger->deprecatedVersion);
        $this->assertEquals('URL', $class->interactions[0]->actions[0]->type);
        $this->assertEquals('url', $class->interactions[0]->actions[0]->url);

        $this->assertEquals('10', $class->cornerRadius);
        $this->assertEquals('15', $class->cornerSmoothing);
        $this->assertEquals('5', $class->rectangleCornerRadii[0]);
        $this->assertEquals('id', $class->id);
        $this->assertTrue($class->locked);
        $this->assertTrue($class->preserveRatio);
        $this->assertTrue($class->isMask);
        $this->assertEquals('20', $class->opacity);

        $this->assertEquals('20', $class->transitionDuration);
        $this->assertEquals('transitionNodeID', $class->transitionNodeID);
        $this->assertEquals('5', $class->size->x);
        $this->assertEquals('4', $class->size->y);
        $this->assertEquals('20', $class->strokeWeight);
        $this->assertEquals('33', $class->strokeDashes[0]);
        $this->assertEquals('OUTSIDE', $class->strokeAlign->value);
        $this->assertEquals('2', $class->relativeTransform[0][1]);
        $this->assertEquals('NORMAL', $class->blendMode->value);
        $this->assertEquals('CENTER', $class->layoutAlign->value);
        $this->assertEquals('BOTTOM', $class->constraints->vertical->value);
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
        $this->assertEquals('DARKEN', $class->effects[0]->blendMode->value);
        $this->assertEquals('id', $class->effects[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->effects[0]->boundVariables[0]->type);
        $this->assertEquals('INNER_SHADOW', $class->effects[0]->type->value);
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
        $this->assertEquals('MULTIPLY', $class->fills[0]->blendMode->value);
        $this->assertEquals('id', $class->fills[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->fills[0]->boundVariables[0]->type);
        $this->assertEquals('GRADIENT_LINEAR', $class->fills[0]->type->value);
        $this->assertEquals('4', $class->fills[0]->gradientHandlePositions[0]->x);
        $this->assertEquals('3', $class->fills[0]->gradientHandlePositions[0]->y);
        $this->assertEquals('10', $class->fills[0]->gradientStops[0]->position);
        $this->assertEquals('1', $class->fills[0]->gradientStops[0]->color->r);
        $this->assertEquals('2', $class->fills[0]->gradientStops[0]->color->g);
        $this->assertEquals('3', $class->fills[0]->gradientStops[0]->color->b);
        $this->assertEquals('4', $class->fills[0]->gradientStops[0]->color->a);
        $this->assertEquals('id', $class->fills[0]->gradientStops[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->fills[0]->gradientStops[0]->boundVariables[0]->type);
        $this->assertEquals('TILE', $class->fills[0]->scaleMode->value);
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
        $this->assertEquals('GRID', $class->styles[0]->styleType->value);

        $this->assertEquals('EASE_OUT', $class->transitionEasing->type->value);
        $this->assertEquals('1', $class->transitionEasing->easingFunctionCubicBezier->x1);
        $this->assertEquals('2', $class->transitionEasing->easingFunctionCubicBezier->x2);
        $this->assertEquals('3', $class->transitionEasing->easingFunctionCubicBezier->y1);
        $this->assertEquals('4', $class->transitionEasing->easingFunctionCubicBezier->y2);
        $this->assertEquals('10', $class->transitionEasing->easingFunctionSpring->mass);
        $this->assertEquals('20', $class->transitionEasing->easingFunctionSpring->stiffness);
        $this->assertEquals('30', $class->transitionEasing->easingFunctionSpring->damping);

        $this->assertEquals('GRADIENT_LINEAR', $class->strokes[0]->type->value);
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
        $this->assertEquals('TILE', $class->strokes[0]->scaleMode->value);
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

        $this->assertEquals('READY_FOR_DEV', $class->devStatus->type->value);
        $this->assertEquals('description', $class->devStatus->description);
    }
    public function testWithMinData()
    {
        $class = new FrameNodeType(['id' => 'id']);

        $this->assertEquals('id', $class->id);
        $this->assertEquals('0', $class->paddingLeft);
        $this->assertEquals('0', $class->paddingRight);
        $this->assertEquals('0', $class->paddingTop);
        $this->assertEquals('0', $class->paddingBottom);
        $this->assertEquals('0', $class->horizontalPadding);
        $this->assertEquals('0', $class->verticalPadding);
        $this->assertEquals('0', $class->itemSpacing);
        $this->assertEquals('0', $class->counterAxisSpacing);
        $this->assertEquals('1', $class->opacity);
        $this->assertFalse($class->isMaskOutline);
        $this->assertFalse($class->strokesIncludedInLayout);
        $this->assertFalse($class->itemReverseZIndex);
        $this->assertFalse($class->clipsContent);
        $this->assertFalse($class->locked);
        $this->assertFalse($class->isMask);
        $this->assertNull($class->preserveRatio);
        $this->assertNull($class->transitionDuration);
        $this->assertNull($class->transitionNodeID);
        $this->assertNull($class->size);
        $this->assertNull($class->strokeWeight);
        $this->assertNull($class->strokeDashes);
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
        $this->assertNull($class->devStatus);
        $this->assertNull($class->layoutGrids);
        $this->assertNull($class->interactions);
        $this->assertNull($class->minHeight);
        $this->assertNull($class->maxHeight);
        $this->assertNull($class->minWidth);
        $this->assertNull($class->maxWidth);
        $this->assertEquals('NONE', $class->overflowDirection->value);
        $this->assertEquals('AUTO', $class->position->value);
        $this->assertEquals('AUTO', $class->counterAxisAlignContent->value);
        $this->assertEquals('MIN', $class->primaryAxisAlignItems->value);
        $this->assertEquals('MIN', $class->counterAxisAlignItems->value);
        $this->assertEquals('NONE', $class->layoutMode->value);
        $this->assertEquals('AUTO', $class->primaryAxisSizingMode->value);
        $this->assertEquals('AUTO', $class->counterAxisSizingMode->value);
        $this->assertNull($class->maskType);
        $this->assertNull($class->layoutSizingHorizontal);
        $this->assertNull($class->layoutSizingVertical);
        $this->assertNull($class->layoutWrap);
        $this->assertNull($class->targetAspectRatio);
    }
    public function testInvalidPaddingLeft()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'paddingLeft' => 'a',
        ]);
    }
    public function testInvalidPaddingRight()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'paddingRight' => 'a',
        ]);
    }
    public function testInvalidPaddingTop()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'paddingTop' => 'a',
        ]);
    }
    public function testInvalidPaddingBottom()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'paddingBottom' => 'a',
        ]);
    }
    public function testInvalidHorizontalPadding()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'horizontalPadding' => 'a',
        ]);
    }
    public function testInvalidVerticalPadding()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'verticalPadding' => 'a',
        ]);
    }
    public function testInvalidItemSpacing()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'itemSpacing' => 'a',
        ]);
    }
    public function testInvalidCounterAxisSpacing()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'counterAxisSpacing' => 'a',
        ]);
    }
    public function testInvalidIsMaskOutline()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'isMaskOutline' => 'a',
        ]);
    }
    public function testInvalidStrokesIncludedInLayout()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'strokesIncludedInLayout' => 'a',
        ]);
    }
    public function testInvalidItemReverseZIndex()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'itemReverseZIndex' => 'a',
        ]);
    }
    public function testInvalidClipsContent()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'clipsContent' => 'a',
        ]);
    }
    public function testInvalidLayoutGrids()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'layoutGrids' => ['a'],
        ]);
    }
    public function testInvalidInteractions()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'interactions' => ['a'],
        ]);
    }
    public function testInvalidMinHeight()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'minHeight' => 'a',
        ]);
    }
    public function testInvalidMaxHeight()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'maxHeight' => 'a',
        ]);
    }
    public function testInvalidMinWidth()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'minWidth' => 'a',
        ]);
    }
    public function testInvalidMaxWidth()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'maxWidth' => 'a',
        ]);
    }
    public function testInvalidOverflowDirection()
    {
        $this->expectException(ValueError::class);
        new FrameNodeType([
            'id' => 'id',
            'overflowDirection' => 'a',
        ]);
    }
    public function testInvalidPosition()
    {
        $this->expectException(ValueError::class);
        new FrameNodeType([
            'id' => 'id',
            'position' => 'a',
        ]);
    }
    public function testInvalidCounterAxisAlignContent()
    {
        $this->expectException(ValueError::class);
        new FrameNodeType([
            'id' => 'id',
            'counterAxisAlignContent' => 'a',
        ]);
    }
    public function testInvalidPrimaryAxisAlignItems()
    {
        $this->expectException(ValueError::class);
        new FrameNodeType([
            'id' => 'id',
            'primaryAxisAlignItems' => 'a',
        ]);
    }
    public function testInvalidCounterAxisAlignItems()
    {
        $this->expectException(ValueError::class);
        new FrameNodeType([
            'id' => 'id',
            'counterAxisAlignItems' => 'a',
        ]);
    }
    public function testInvalidLayoutMode()
    {
        $this->expectException(ValueError::class);
        new FrameNodeType([
            'id' => 'id',
            'layoutMode' => 'a',
        ]);
    }
    public function testInvalidPrimaryAxisSizingMode()
    {
        $this->expectException(ValueError::class);
        new FrameNodeType([
            'id' => 'id',
            'primaryAxisSizingMode' => 'a',
        ]);
    }
    public function testInvalidCounterAxisSizingMode()
    {
        $this->expectException(ValueError::class);
        new FrameNodeType([
            'id' => 'id',
            'counterAxisSizingMode' => 'a',
        ]);
    }
    public function testInvalidMaskType()
    {
        $class = new FrameNodeType([
            'id' => 'id',
            'maskType' => 'a',
        ]);
        $this->assertNull($class->maskType);
    }
    public function testInvalidLayoutSizingHorizontal()
    {
        $class = new FrameNodeType([
            'id' => 'id',
            'layoutSizingHorizontal' => 'a',
        ]);
        $this->assertNull($class->layoutSizingHorizontal);
    }
    public function testInvalidLayoutSizingVertical()
    {
        $class = new FrameNodeType([
            'id' => 'id',
            'layoutSizingVertical' => 'a',
        ]);
        $this->assertNull($class->layoutSizingVertical);
    }
    public function testInvalidLayoutWrap()
    {
        $class = new FrameNodeType([
            'id' => 'id',
            'layoutWrap' => 'a',
        ]);
        $this->assertNull($class->layoutWrap);
    }
    public function testInvalidTargetAspectRatio()
    {
        $this->expectException(TypeError::class);
        new FrameNodeType([
            'id' => 'id',
            'targetAspectRatio' => 'a',
        ]);
    }
}
