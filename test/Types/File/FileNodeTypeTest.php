<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\FileNodeType;

final class FileNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new FileNodeType([
            'document' => [
                'id' => 'id',
                'name' => 'name',
                'type' => 'type',
                'scrollBehavior' => 'scrollBehavior',
            ],
            'styles' => [[
                'key' => 'key',
                'name' => 'name',
                'remote' => false,
                'description' => 'description',
                'style_type' => 'GRID',
            ]],
            'components' => [[
                'componentSetId' => 'componentSetId',
                'key' => 'key',
                'name' => 'name',
                'description' => 'description',
                'remote' => false,
                'documentationLinks' => [['url' => 'url']],
            ]],
            'componentSets' => [[
                'key' => 'key',
                'name' => 'name',
                'description' => 'description',
                'remote' => false,
                'documentationLinks' => [['url' => 'url']],
            ]],
        ]);
        $this->assertEquals('key', $class->styles[0]->key);
        $this->assertEquals('name', $class->styles[0]->name);
        $this->assertEquals('description', $class->styles[0]->description);
        $this->assertFalse($class->styles[0]->remote);
        $this->assertEquals('GRID', $class->styles[0]->styleType);

        $this->assertEquals('id', $class->document->id);
        $this->assertEquals('name', $class->document->name);
        $this->assertEquals('type', $class->document->type);
        $this->assertEquals('scrollBehavior', $class->document->scrollBehavior);

        $this->assertEquals('key', $class->componentSets[0]->key);
        $this->assertEquals('name', $class->componentSets[0]->name);
        $this->assertEquals('description', $class->componentSets[0]->description);
        $this->assertFalse($class->componentSets[0]->remote);
        $this->assertIsArray($class->componentSets[0]->documentationLinks);
        $this->assertEquals('url', $class->componentSets[0]->documentationLinks[0]);

        $this->assertEquals('componentSetId', $class->components[0]->componentSetId);
        $this->assertEquals('key', $class->components[0]->key);
        $this->assertEquals('name', $class->components[0]->name);
        $this->assertEquals('description', $class->components[0]->description);
        $this->assertFalse($class->components[0]->remote);
        $this->assertIsArray($class->components[0]->documentationLinks);
        $this->assertEquals('url', $class->components[0]->documentationLinks[0]);
    }
    public function testWithMinData(): void
    {
        $class = new FileNodeType([]);

        $this->assertNull($class->document);
        $this->assertNull($class->styles);
        $this->assertNull($class->componentSets);
        $this->assertNull($class->components);
    }
}
