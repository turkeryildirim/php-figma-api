<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\ComponentPropertyDefinitionType;
use Turker\FigmaAPI\Types\File\InstanceSwapPreferredValueType;
use TypeError;
use ValueError;

final class ComponentPropertyDefinitionTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new ComponentPropertyDefinitionType([
            'variantOptions' => ['a' => 'b'],
            'defaultValue' => 'defaultValue',
            'type' => 'TEXT',
            'preferredValues' => [[
                'key' => 'key',
                'type' => 'COMPONENT',
            ]]
        ]);
        $this->assertIsArray($class->variantOptions);
        $this->assertEquals('defaultValue', $class->defaultValue);
        $this->assertEquals('TEXT', $class->type->value);
        $this->assertIsArray($class->preferredValues);
        $this->assertInstanceOf(
            InstanceSwapPreferredValueType::class,
            $class->preferredValues[0]
        );
        $this->assertEquals('key', $class->preferredValues[0]->key);
        $this->assertEquals('COMPONENT', $class->preferredValues[0]->type->value);
    }
    public function testWithMinData(): void
    {
        $class = new ComponentPropertyDefinitionType([
            'type' => 'TEXT'
        ]);
        $this->assertNull($class->variantOptions);
        $this->assertNull($class->preferredValues);
        $this->assertNull($class->defaultValue);
        $this->assertEquals('TEXT', $class->type->value);
    }
    public function testInvalidType()
    {
        $this->expectException(ValueError::class);
        new ComponentPropertyDefinitionType([
            'type' => 'type'
        ]);
    }
    public function testInvalidVariantOptions()
    {
        $this->expectException(TypeError::class);
        new ComponentPropertyDefinitionType([
            'variantOptions' => 'a',
        ]);
    }
    public function testInvalidDefaultValue()
    {
        $this->expectException(TypeError::class);
        new ComponentPropertyDefinitionType([
            'defaultValue' => 5,
        ]);
    }
}
