<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\MeasurementType;
use TypeError;

final class MeasurementTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new MeasurementType([
            'id' => 'id',
            'freeText' => 'freeText',
            'start' => [
                'side' => 'RIGHT',
                'node_id' => 'node_id'
            ],
            'offset' => [
                'fixed' => 5
            ]
        ]);
        $this->assertEquals('id', $class->id);
        $this->assertEquals('freeText', $class->freeText);
        $this->assertEquals('node_id', $class->start->nodeId);
        $this->assertEquals('RIGHT', $class->start->side->value);
        $this->assertEquals('OUTER', $class->offset->type);
        $this->assertEquals('5', $class->offset->fixed);
    }
    public function testWithMinData(): void
    {
        $class = new MeasurementType([
            'id' => 'id',
            'offset' => [
                'fixed' => 5
            ]
        ]);
        $this->assertEquals('id', $class->id);
        $this->assertNull($class->freeText);
        $this->assertNull($class->start);
        $this->assertEquals('OUTER', $class->offset->type);
        $this->assertEquals('5', $class->offset->fixed);
    }
    public function testInvalidOffset(): void
    {
        $this->expectException(TypeError::class);
        new MeasurementType([
            'id' => 'id',
            'freeText' => 5,
            'offset' => ['fixed' => 5]
        ]);
    }
    public function testInvalidFreeText(): void
    {
        $this->expectException(TypeError::class);
        new MeasurementType([
            'id' => 'id',
            'offset' => ['a']
        ]);
    }
    public function testInvalidSide(): void
    {
        $this->expectException(TypeError::class);
        new MeasurementType([
            'id' => 'id',
            'side' => ['a']
        ]);
    }
}
