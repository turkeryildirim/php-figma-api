<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\ComponentType;
use TypeError;

final class ComponentTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new ComponentType([
            'componentSetId' => 'componentSetId',
            'key' => 'key',
            'name' => 'name',
            'description' => 'description',
            'remote' => false,
            'documentationLinks' => [['url' => 'url']],
        ]);
        $this->assertEquals('componentSetId', $class->componentSetId);
        $this->assertEquals('key', $class->key);
        $this->assertEquals('name', $class->name);
        $this->assertEquals('description', $class->description);
        $this->assertFalse($class->remote);
        $this->assertIsArray($class->documentationLinks);
        $this->assertEquals('url', $class->documentationLinks[0]);
    }
    public function testWithMinData()
    {
        $class = new ComponentType([
            'key' => 'key'
        ]);
        $this->assertEquals('key', $class->key);
        $this->assertNull($class->name);
        $this->assertNull($class->componentSetId);
        $this->assertNull($class->description);
        $this->assertFalse($class->remote);
        $this->assertNull($class->documentationLinks);
    }
    public function testInvalidComponentSetId()
    {
        $this->expectException(TypeError::class);
        new ComponentType([
            'componentSetId' => 5,
            'key' => 'key'
        ]);
    }
}
