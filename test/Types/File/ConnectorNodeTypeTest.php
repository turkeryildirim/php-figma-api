<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Common\VectorType;
use Turker\FigmaAPI\Types\File\ColorType;
use Turker\FigmaAPI\Types\File\ConnectorEndpointType;
use Turker\FigmaAPI\Types\File\ConnectorNodeType;
use Turker\FigmaAPI\Types\File\ConnectorTextBackgroundType;
use Turker\FigmaAPI\Types\File\EffectType;
use Turker\FigmaAPI\Types\File\PaintType;
use Turker\FigmaAPI\Types\File\RectangleType;
use Turker\FigmaAPI\Types\File\StyleType;
use TypeError;

final class ConnectorNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new ConnectorNodeType([
            'id' => 'id',
            'absoluteBoundingBox' => ['width' => 10, 'height' => 10, 'x' => 1, 'y' => 2],
            'absoluteRenderBounds' => ['width' => 10, 'height' => 10, 'x' => 1, 'y' => 2],
            'backgroundColor' => ['r' => 0, 'g' => 0, 'b' => 0,'a' => 0],
            'blendMode' => 'NORMAL',
            'characters' => 'characters',
            'cornerRadius' => 10,
            'cornerSmoothing' => 15,
            'rectangleCornerRadii' => [5,6],
            'isMask' => true,
            'locked' => true,
            'opacity' => 20,
            'strokeWeight' => 20,
            'strokeDashes' => [33,44],
            'strokeCap' => 'SQUARE',
            'strokeJoin' => 'BEVEL',
            'strokeAlign' => 'OUTSIDE',
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
            'styles' => [[
                'key' => 'key',
                'name' => 'name',
                'remote' => false,
                'description' => 'description',
                'style_type' => 'GRID',
            ]],
            'connectorStart' => [
                'endpointNodeId' => 'endpointNodeId',
                'position' => ['x' => 10, 'y' => 20],
                'magnet' => 'AUTO',
            ],
            'connectorEnd' => [
                'endpointNodeId' => 'endpointNodeId',
                'position' => ['x' => 10, 'y' => 20],
                'magnet' => 'AUTO',
            ],
            'connectorStartStrokeCap' => 'LINE_ARROW',
            'connectorEndStrokeCap' => 'TRIANGLE_ARROW',
            'connectorLineType' => 'STRAIGHT',
            'textBackground' => [
                'cornerRadius' => 24,
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
            ],
        ]);
        $this->assertInstanceOf(VectorType::class, $class->connectorStart->position);
        $this->assertInstanceOf(RectangleType::class, $class->absoluteBoundingBox);
        $this->assertInstanceOf(RectangleType::class, $class->absoluteRenderBounds);
        $this->assertInstanceOf(ColorType::class, $class->backgroundColor);
        $this->assertInstanceOf(EffectType::class, $class->effects[0]);
        $this->assertInstanceOf(PaintType::class, $class->fills[0]);
        $this->assertInstanceOf(StyleType::class, $class->styles[0]);
        $this->assertInstanceOf(ConnectorEndpointType::class, $class->connectorStart);
        $this->assertInstanceOf(ConnectorEndpointType::class, $class->connectorEnd);
        $this->assertInstanceOf(ConnectorTextBackgroundType::class, $class->textBackground);

        $this->assertEquals('id', $class->id);
        $this->assertEquals('1', $class->absoluteBoundingBox->x);
        $this->assertEquals('2', $class->absoluteBoundingBox->y);
        $this->assertEquals('10', $class->absoluteBoundingBox->width);
        $this->assertEquals('10', $class->absoluteBoundingBox->height);
        $this->assertEquals('1', $class->absoluteRenderBounds->x);
        $this->assertEquals('2', $class->absoluteRenderBounds->y);
        $this->assertEquals('10', $class->absoluteRenderBounds->width);
        $this->assertEquals('10', $class->absoluteRenderBounds->height);
        $this->assertEquals('0', $class->backgroundColor->r);
        $this->assertEquals('0', $class->backgroundColor->g);
        $this->assertEquals('0', $class->backgroundColor->b);
        $this->assertEquals('0', $class->backgroundColor->a);
        $this->assertEquals('NORMAL', $class->blendMode);
        $this->assertEquals('characters', $class->characters);
        $this->assertEquals('10', $class->cornerRadius);
        $this->assertEquals('15', $class->cornerSmoothing);
        $this->assertEquals('5', $class->rectangleCornerRadii[0]);
        $this->assertTrue($class->isMask);
        $this->assertTrue($class->locked);
        $this->assertEquals('20', $class->opacity);
        $this->assertEquals('20', $class->strokeWeight);
        $this->assertEquals('33', $class->strokeDashes[0]);
        $this->assertEquals('SQUARE', $class->strokeCap);
        $this->assertEquals('BEVEL', $class->strokeJoin);
        $this->assertEquals('OUTSIDE', $class->strokeAlign);
        $this->assertEquals('2', $class->relativeTransform[0][1]);

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

        $this->assertEquals('endpointNodeId', $class->connectorStart->endpointNodeId);
        $this->assertEquals('10', $class->connectorStart->position->x);
        $this->assertEquals('20', $class->connectorStart->position->y);
        $this->assertEquals('AUTO', $class->connectorStart->magnet);
        $this->assertEquals('endpointNodeId', $class->connectorEnd->endpointNodeId);
        $this->assertEquals('10', $class->connectorEnd->position->x);
        $this->assertEquals('20', $class->connectorEnd->position->y);
        $this->assertEquals('AUTO', $class->connectorEnd->magnet);
        $this->assertEquals('LINE_ARROW', $class->connectorStartStrokeCap);
        $this->assertEquals('TRIANGLE_ARROW', $class->connectorEndStrokeCap);
        $this->assertEquals('STRAIGHT', $class->connectorLineType);

        $this->assertEquals('24', $class->textBackground->cornerRadius);
        $this->assertFalse($class->textBackground->fills[0]->visible);
        $this->assertEquals('15', $class->textBackground->fills[0]->color->r);
        $this->assertEquals('25', $class->textBackground->fills[0]->color->g);
        $this->assertEquals('35', $class->textBackground->fills[0]->color->b);
        $this->assertEquals('45', $class->textBackground->fills[0]->color->a);
        $this->assertEquals('MULTIPLY', $class->textBackground->fills[0]->blendMode);
        $this->assertEquals('id', $class->textBackground->fills[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->textBackground->fills[0]->boundVariables[0]->type);
        $this->assertEquals('GRADIENT_LINEAR', $class->textBackground->fills[0]->type);
        $this->assertEquals('4', $class->textBackground->fills[0]->gradientHandlePositions[0]->x);
        $this->assertEquals('3', $class->textBackground->fills[0]->gradientHandlePositions[0]->y);
        $this->assertEquals('10', $class->textBackground->fills[0]->gradientStops[0]->position);
        $this->assertEquals('1', $class->textBackground->fills[0]->gradientStops[0]->color->r);
        $this->assertEquals('2', $class->textBackground->fills[0]->gradientStops[0]->color->g);
        $this->assertEquals('3', $class->textBackground->fills[0]->gradientStops[0]->color->b);
        $this->assertEquals('4', $class->textBackground->fills[0]->gradientStops[0]->color->a);
        $this->assertEquals('id', $class->textBackground->fills[0]->gradientStops[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->textBackground->fills[0]->gradientStops[0]->boundVariables[0]->type);
        $this->assertEquals('TILE', $class->textBackground->fills[0]->scaleMode);
        $this->assertEquals('9', $class->textBackground->fills[0]->imageTransform[0][0]);
        $this->assertEquals('26', $class->textBackground->fills[0]->scalingFactor);
        $this->assertEquals('19', $class->textBackground->fills[0]->rotation);
        $this->assertEquals('imageRef', $class->textBackground->fills[0]->imageRef);
        $this->assertEquals('gifRef', $class->textBackground->fills[0]->gifRef);
        $this->assertEquals('1', $class->textBackground->fills[0]->filters[0]->exposure);
        $this->assertEquals('2', $class->textBackground->fills[0]->filters[0]->contrast);
        $this->assertEquals('3', $class->textBackground->fills[0]->filters[0]->saturation);
        $this->assertEquals('4', $class->textBackground->fills[0]->filters[0]->temperature);
        $this->assertEquals('5', $class->textBackground->fills[0]->filters[0]->tint);
        $this->assertEquals('6', $class->textBackground->fills[0]->filters[0]->highlights);
        $this->assertEquals('7', $class->textBackground->fills[0]->filters[0]->shadows);

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
    public function testWithMinData()
    {
        $data  = $this->getMinValidData();
        $class = new ConnectorNodeType($data);
        $this->assertInstanceOf(ConnectorEndpointType::class, $class->connectorStart);
        $this->assertInstanceOf(ConnectorEndpointType::class, $class->connectorEnd);
        $this->assertEquals('id', $class->id);
        $this->assertEquals('endpointNodeId', $class->connectorStart->endpointNodeId);
        $this->assertEquals('10', $class->connectorStart->position->x);
        $this->assertEquals('20', $class->connectorStart->position->y);
        $this->assertEquals('AUTO', $class->connectorStart->magnet);
        $this->assertEquals('endpointNodeId', $class->connectorEnd->endpointNodeId);
        $this->assertEquals('10', $class->connectorEnd->position->x);
        $this->assertEquals('20', $class->connectorEnd->position->y);
        $this->assertEquals('AUTO', $class->connectorEnd->magnet);
        $this->assertEquals('LINE_ARROW', $class->connectorStartStrokeCap);
        $this->assertEquals('TRIANGLE_ARROW', $class->connectorEndStrokeCap);
        $this->assertEquals('0', $class->cornerSmoothing);
        $this->assertEquals('1', $class->opacity);
        $this->assertNull($class->absoluteBoundingBox);
        $this->assertNull($class->absoluteRenderBounds);
        $this->assertNull($class->backgroundColor);
        $this->assertNull($class->blendMode);
        $this->assertNull($class->cornerRadius);
        $this->assertNull($class->rectangleCornerRadii);
        $this->assertNull($class->strokeWeight);
        $this->assertNull($class->strokeDashes);
        $this->assertNull($class->strokeCap);
        $this->assertNull($class->strokeJoin);
        $this->assertNull($class->strokeAlign);
        $this->assertNull($class->relativeTransform);
        $this->assertNull($class->effects);
        $this->assertNull($class->fills);
        $this->assertNull($class->strokes);
        $this->assertNull($class->styles);
        $this->assertFalse($class->isMask);
        $this->assertFalse($class->locked);
    }
    public function testInvalidFills()
    {
        $this->expectException(TypeError::class);
        $data          = $this->getMinValidData();
        $data['fills'] = ['a'];
        ;
        new ConnectorNodeType($data);
    }
    public function testInvalidConnectorStart()
    {
        $data                   = $this->getMinValidData();
        $data['connectorStart'] = true;
        $class                  = new ConnectorNodeType($data);
        $this->assertNull($class->connectorStart);
    }
    public function testInvalidConnectorEnd()
    {
        $data                 = $this->getMinValidData();
        $data['connectorEnd'] = true;
        $class                = new ConnectorNodeType($data);
        $this->assertNull($class->connectorEnd);
    }
    public function testInvalidConnectorStartStrokeCap()
    {
        $data = $this->getMinValidData();
        $data['connectorStartStrokeCap'] = 'true';
        $class = new ConnectorNodeType($data);
        $this->assertEquals('NONE', $class->connectorStartStrokeCap);
    }
    public function testInvalidConnectorEndStrokeCap()
    {
        $data = $this->getMinValidData();
        $data['connectorEndStrokeCap'] = 'true';
        new ConnectorNodeType($data);
        $class = new ConnectorNodeType($data);
        $this->assertEquals('NONE', $class->connectorEndStrokeCap);
    }
    public function testInvalidConnectorLineType()
    {
        $data = $this->getMinValidData();
        $data['connectorLineType'] = 'true';
        $class = new ConnectorNodeType($data);
        $this->assertNull($class->connectorLineType);
    }
    public function testInvalidTextBackground()
    {
        $data                   = $this->getMinValidData();
        $data['textBackground'] = 'true';
        $class                  = new ConnectorNodeType($data);
        $this->assertNull($class->textBackground);
    }
    private function getMinValidData(): array
    {
        return [
            'id' => 'id',
            'characters' => 'characters',
            'connectorStart' => [
                'endpointNodeId' => 'endpointNodeId',
                'position' => ['x' => 10, 'y' => 20],
                'magnet' => 'AUTO',
            ],
            'connectorEnd' => [
                'endpointNodeId' => 'endpointNodeId',
                'position' => ['x' => 10, 'y' => 20],
                'magnet' => 'AUTO',
            ],
            'connectorStartStrokeCap' => 'LINE_ARROW',
            'connectorEndStrokeCap' => 'TRIANGLE_ARROW',
        ];
    }
}
