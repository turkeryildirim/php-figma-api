<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\ComponentPropertyType;
use Turker\FigmaAPI\Types\File\InstanceSwapPreferredValueType;
use Turker\FigmaAPI\Types\File\VariableAliasType;
use TypeError;
use ValueError;

final class ComponentPropertyTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new ComponentPropertyType([
            'type' => 'TEXT',
            'value' => 'value',
            'boundVariables' => [
                [
                    'id' => 'id',
                    'type' => 'type',
                ]
            ],
            'preferredValues' => [[
                'key' => 'key',
                'type' => 'COMPONENT',
            ]]
        ]);
        $this->assertIsArray($class->preferredValues);
        $this->assertIsArray($class->boundVariables);
        $this->assertEquals('value', $class->value);
        $this->assertEquals('TEXT', $class->type);
        $this->assertInstanceOf(
            InstanceSwapPreferredValueType::class,
            $class->preferredValues[0]
        );
        $this->assertEquals('key', $class->preferredValues[0]->key);
        $this->assertEquals('COMPONENT', $class->preferredValues[0]->type);
        $this->assertInstanceOf(
            VariableAliasType::class,
            $class->boundVariables[0]
        );
        $this->assertEquals('id', $class->boundVariables[0]->id);
        $this->assertEquals('type', $class->boundVariables[0]->type);
    }
    public function testWithMinData(): void
    {
        $class = new ComponentPropertyType([
            'type' => 'TEXT',
            'value' => 'value',
        ]);
        $this->assertNull($class->boundVariables);
        $this->assertNull($class->preferredValues);
        $this->assertEquals('TEXT', $class->type);
    }
    public function testInvalidType()
    {
        $class = new ComponentPropertyType([
            'type' => 'type',
            'value' => 'value',
        ]);
        $this->assertNull($class->type);
    }
    public function testInvalidValue()
    {
        $this->expectException(TypeError::class);
        new ComponentPropertyType([
            'type' => 'TEXT',
            'value' => 5,
        ]);
    }
}
