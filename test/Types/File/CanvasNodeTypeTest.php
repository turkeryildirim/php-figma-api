<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\CanvasNodeType;
use Turker\FigmaAPI\Types\File\ColorType;
use Turker\FigmaAPI\Types\File\FlowStartingPointsType;
use Turker\FigmaAPI\Types\File\MeasurementType;
use Turker\FigmaAPI\Types\File\PrototypeDeviceType;
use TypeError;

final class CanvasNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new CanvasNodeType([
            'id' => 'id',
            'name' => 'name',
            'type' => 'type',
            'scrollBehavior' => 'scrollBehavior',
            'prototypeStartNodeID' => 'prototypeStartNodeID',
            'flowStartingPoints' => [
                    'nodeId' => 'nodeId',
                    'name' => 'name',
                ],
            'prototypeDevice' =>
                [
                    'presetIdentifier' => 'presetIdentifier',
                    'type' => 'PRESET',
                    'rotation' => 'CCW_90',
                    'size' => 'WIDTH',
                ],
            'measurements' => [
                [
                    'id' => 'id',
                    'freeText' => 'freeText',
                    'start' => [
                        'side' => 'RIGHT',
                        'node_id' => 'node_id',
                    ],
                    'offset' => [
                        'type' => 'OUTER',
                        'fixed' => 10
                    ],
                ],
            ],
            'backgroundColor' => [
                'r' => 1,
                'g' => 2,
                'b' => 3,
                'a' => 4,
            ]
        ]);
        $this->assertInstanceOf(ColorType::class, $class->backgroundColor);
        $this->assertInstanceOf(FlowStartingPointsType::class, $class->flowStartingPoints);
        $this->assertInstanceOf(PrototypeDeviceType::class, $class->prototypeDevice);
        $this->assertInstanceOf(MeasurementType::class, $class->measurements[0]);
        $this->assertEquals('id', $class->id);
        $this->assertEquals('name', $class->name);
        $this->assertEquals('type', $class->type);
        $this->assertEquals('scrollBehavior', $class->scrollBehavior);
        $this->assertEquals('prototypeStartNodeID', $class->prototypeStartNodeID);
        $this->assertEquals('1', $class->backgroundColor->r);
        $this->assertEquals('2', $class->backgroundColor->g);
        $this->assertEquals('3', $class->backgroundColor->b);
        $this->assertEquals('4', $class->backgroundColor->a);
        $this->assertEquals('nodeId', $class->flowStartingPoints->nodeId);
        $this->assertEquals('name', $class->flowStartingPoints->name);
        $this->assertEquals('presetIdentifier', $class->prototypeDevice->presetIdentifier);
        $this->assertEquals('PRESET', $class->prototypeDevice->type->value);
        $this->assertEquals('WIDTH', $class->prototypeDevice->size->value);
        $this->assertEquals('CCW_90', $class->prototypeDevice->rotation->value);
        $this->assertIsArray($class->measurements);
        $this->assertEquals('id', $class->measurements[0]->id);
        $this->assertEquals('freeText', $class->measurements[0]->freeText);
        $this->assertEquals('RIGHT', $class->measurements[0]->start->side->value);
        $this->assertEquals('node_id', $class->measurements[0]->start->nodeId);
        $this->assertEquals('OUTER', $class->measurements[0]->offset->type);
        $this->assertEquals('10', $class->measurements[0]->offset->fixed);
    }
    public function testWithMinData(): void
    {
        $class = new CanvasNodeType(['id' => 'id', 'type' => 'type']);
        $this->assertEquals('type', $class->type);
        $this->assertEquals('id', $class->id);
        $this->assertNull($class->name);
        $this->assertNull($class->scrollBehavior);
        $this->assertNull($class->prototypeStartNodeID);
        $this->assertNull($class->backgroundColor);
        $this->assertNull($class->flowStartingPoints);
        $this->assertNull($class->prototypeDevice);
        $this->assertNull($class->measurements);
    }
    public function testInvalidPrototypeStartNodeID(): void
    {
        $this->expectException(TypeError::class);
        new CanvasNodeType(['id' => 'id', 'type' => 'type', 'prototypeStartNodeID' => 50]);
    }
    public function testInvalidFlowStartingPoints(): void
    {
        $this->expectException(TypeError::class);
        new CanvasNodeType(['id' => 'id', 'type' => 'type', 'flowStartingPoints' => 50]);
    }
    public function testInvalidPrototypeDevice(): void
    {
        $this->expectException(TypeError::class);
        new CanvasNodeType(['id' => 'id', 'type' => 'type', 'prototypeDevice' => 50]);
    }
    public function testInvalidMeasurements(): void
    {
        $this->expectException(TypeError::class);
         new CanvasNodeType(['id' => 'id', 'type' => 'type', 'measurements' => ['a' => 'b']]);
    }
}
