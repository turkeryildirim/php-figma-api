<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\ArcDataType;
use Turker\FigmaAPI\Types\File\FileType;
use TypeError;

final class FileTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new FileType([
            'name' => 'name',
            'last_modified' => 'last_modified',
            'thumbnail_url' => 'thumbnail_url',
            'role' => 'role',
            'version' => 'version',
            'mainFileKey' => 'mainFileKey',
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
            'branches' => [
                [
                    'key' => 'key',
                    'thumbnail_url' => 'thumbnail_url',
                    'name' => 'name',
                    'lastModified' => 'last_modified',
                ]
            ],
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
        $this->assertEquals('name', $class->name);
        $this->assertEquals('thumbnail_url', $class->thumbnailUrl);
        $this->assertEquals('last_modified', $class->lastModified);
        $this->assertEquals('mainFileKey', $class->mainFileKey);
        $this->assertEquals('role', $class->role);
        $this->assertEquals('version', $class->version);

        $this->assertEquals('key', $class->styles[0]->key);
        $this->assertEquals('name', $class->styles[0]->name);
        $this->assertEquals('description', $class->styles[0]->description);
        $this->assertFalse($class->styles[0]->remote);
        $this->assertEquals('GRID', $class->styles[0]->styleType->value);

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

        $this->assertIsArray($class->branches);
        $this->assertEquals('key', $class->branches[0]->key);
        $this->assertEquals('name', $class->branches[0]->name);
        $this->assertEquals('thumbnail_url', $class->branches[0]->thumbnailUrl);
        $this->assertEquals('last_modified', $class->branches[0]->lastModified);
        $this->assertNull($class->branches[0]->branches);
    }
    public function testWithMinData(): void
    {
        $class = new FileType([]);

        $this->assertNull($class->name);
        $this->assertNull($class->role);
        $this->assertNull($class->version);
        $this->assertNull($class->document);
        $this->assertNull($class->thumbnailUrl);
        $this->assertNull($class->lastModified);
        $this->assertNull($class->mainFileKey);
        $this->assertNull($class->styles);
        $this->assertNull($class->componentSets);
        $this->assertNull($class->components);
        $this->assertNull($class->branches);
    }
    public function testInvalidRole(): void
    {
        $this->expectException(TypeError::class);
        new FileType(['role' => 5]);
    }
    public function testInvalidVersion(): void
    {
        $this->expectException(TypeError::class);
        new FileType(['version' => 5]);
    }
    public function testInvalidMainFileKey(): void
    {
        $this->expectException(TypeError::class);
        new FileType(['mainFileKey' => 5]);
    }
}
