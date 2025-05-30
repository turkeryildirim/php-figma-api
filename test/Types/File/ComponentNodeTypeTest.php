<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\ComponentNodeType;
use Turker\FigmaAPI\Types\File\ComponentPropertyDefinitionType;
use Turker\FigmaAPI\Types\File\InstanceSwapPreferredValueType;
use TypeError;

final class ComponentNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new ComponentNodeType([
            'id' => 'id',
            'componentPropertyDefinitions' => [[
                'variantOptions' => ['a' => 'b'],
                'defaultValue' => 'defaultValue',
                'type' => 'TEXT',
                'preferredValues' => [[
                    'key' => 'key',
                    'type' => 'COMPONENT',
                ]]
            ]],
        ]);
        $this->assertIsArray($class->componentPropertyDefinitions);
        $this->assertInstanceOf(
            ComponentPropertyDefinitionType::class,
            $class->componentPropertyDefinitions[0]
        );
        $this->assertIsArray($class->componentPropertyDefinitions[0]->variantOptions);
        $this->assertEquals('defaultValue', $class->componentPropertyDefinitions[0]->defaultValue);
        $this->assertEquals('TEXT', $class->componentPropertyDefinitions[0]->type);
        $this->assertIsArray($class->componentPropertyDefinitions[0]->preferredValues);
        $this->assertInstanceOf(
            InstanceSwapPreferredValueType::class,
            $class->componentPropertyDefinitions[0]->preferredValues[0]
        );
        $this->assertEquals('key', $class->componentPropertyDefinitions[0]->preferredValues[0]->key);
        $this->assertEquals('COMPONENT', $class->componentPropertyDefinitions[0]->preferredValues[0]->type);
    }
    public function testInvalidComponentPropertyDefinitions()
    {
        $this->expectException(TypeError::class);
        new ComponentNodeType([
            'id' => 'id',
            'componentPropertyDefinitions' => ['a' => 'b'],
        ]);
    }
}
