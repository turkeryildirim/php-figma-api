<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\BooleanOperationNodeType;
use Turker\FigmaAPI\Types\File\InstanceNodeType;
use Turker\FigmaAPI\Types\File\VectorNodeType;
use TypeError;

final class InstanceNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new InstanceNodeType([
            'id' => 'id',
            'componentId' => 'componentId',
            'isExposedInstance' => true,
            'exposedInstances' => ['a','b'],
            'componentProperties' => [[
                'value' => 'value',
                'type' => 'INSTANCE_SWAP',
                'boundVariables' => [[
                    'id' => 'id',
                    'type' => 'type',
                ]],
                'preferredValues' => [[
                    'key' => 'key',
                    'type' => 'COMPONENT',
                ]]
            ]],
            'overrides' => [[
                'id' => 'id',
                'overriddenFields' => ['a','b'],
            ]],
        ]);
        $this->assertEquals('id', $class->id);
        $this->assertEquals('componentId', $class->componentId);
        $this->assertEquals('b', $class->exposedInstances[1]);
        $this->assertTrue($class->isExposedInstance);
        $this->assertEquals('value', $class->componentProperties[0]->value);
        $this->assertEquals('INSTANCE_SWAP', $class->componentProperties[0]->type);
        $this->assertEquals('id', $class->componentProperties[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->componentProperties[0]->boundVariables[0]->type);
        $this->assertEquals('key', $class->componentProperties[0]->preferredValues[0]->key);
        $this->assertEquals('COMPONENT', $class->componentProperties[0]->preferredValues[0]->type);
        $this->assertEquals('id', $class->overrides[0]->id);
        $this->assertEquals('b', $class->overrides[0]->overriddenFields[1]);
    }
    public function testWithMinData()
    {
        $class = new InstanceNodeType([
            'id' => 'id',
            'componentId' => 'componentId'
        ]);

        $this->assertEquals('id', $class->id);
        $this->assertEquals('componentId', $class->componentId);
        $this->assertFalse($class->isExposedInstance);
        $this->assertNull($class->exposedInstances);
        $this->assertNull($class->componentProperties);
        $this->assertNull($class->overrides);
    }
    public function testInvalidComponentId()
    {
        $this->expectException(TypeError::class);
        new InstanceNodeType([
            'id' => 'id',
            'componentId' => 1
        ]);
    }
    public function testInvalidIsExposedInstance()
    {
        $this->expectException(TypeError::class);
        new InstanceNodeType([
            'id' => 'id',
            'isExposedInstance' => 1
        ]);
    }
    public function testInvalidExposedInstance()
    {
        $this->expectException(TypeError::class);
        new InstanceNodeType([
            'id' => 'id',
            'exposedInstances' => 1
        ]);
    }
    public function testInvalidComponentProperties()
    {
        $this->expectException(TypeError::class);
        new InstanceNodeType([
            'id' => 'id',
            'componentProperties' => 1
        ]);
    }
    public function testInvalidOverrides()
    {
        $this->expectException(TypeError::class);
        new InstanceNodeType([
            'id' => 'id',
            'overrides' => 1
        ]);
    }
}
