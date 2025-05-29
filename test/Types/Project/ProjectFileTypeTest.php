<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\Project;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Project\ProjectFileType;

final class ProjectFileTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $arrayVar = [
            'key' => 'key',
            'thumbnail_url' => 'thumbnail_url',
            'name' => 'name',
            'last_modified' => 'last_modified',
            'branches' => [
                [
                    'key' => 'key',
                    'thumbnail_url' => 'thumbnail_url',
                    'name' => 'name',
                    'lastModified' => 'last_modified',
                ]
            ],
        ];
        $class    = new ProjectFileType($arrayVar);

        $this->assertEquals('key', $class->key);
        $this->assertEquals('name', $class->name);
        $this->assertEquals('thumbnail_url', $class->thumbnailUrl);
        $this->assertEquals('last_modified', $class->lastModified);
        $this->assertIsArray($class->branches);
        $this->assertEquals('key', $class->branches[0]->key);
        $this->assertEquals('name', $class->branches[0]->name);
        $this->assertEquals('thumbnail_url', $class->branches[0]->thumbnailUrl);
        $this->assertEquals('last_modified', $class->branches[0]->lastModified);
        $this->assertNull($class->branches[0]->branches);
    }
    public function testWithMinData(): void
    {
        $class = new ProjectFileType(['key' => 'key']);
        $this->assertEquals('key', $class->key);
        $this->assertNull($class->name);
        $this->assertNull($class->lastModified);
        $this->assertNull($class->thumbnailUrl);
        $this->assertNull($class->branches);
        $this->assertNull($class->lastModified);
    }
}
