<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\FileMetaType;
use Turker\FigmaAPI\Types\User\UserType;

final class FileMetaTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new FileMetaType([
            'name' => 'name',
            'thumbnail_url' => 'thumbnail_url',
            'role' => 'role',
            'last_touched_at' => 'last_touched_at',
            'folder_name' => 'folder_name',
            'version' => 'version',
            'link_access' => 'link_access',
            'url' => 'url',
            'creator' => ['id' => 'id', 'handle' => 'handle', 'img_url' => 'img_url'],
            'last_touched_by' => ['id' => 'id', 'handle' => 'handle', 'img_url' => 'img_url']
        ]);
        $this->assertEquals('name', $class->name);
        $this->assertEquals('thumbnail_url', $class->thumbnailUrl);
        $this->assertEquals('role', $class->role);
        $this->assertEquals('last_touched_at', $class->lastTouchedAt);
        $this->assertEquals('folder_name', $class->folderName);
        $this->assertEquals('version', $class->version);
        $this->assertEquals('link_access', $class->linkAccess);
        $this->assertEquals('url', $class->url);
        $this->assertInstanceOf(UserType::class, $class->creator);
        $this->assertInstanceOf(UserType::class, $class->lastTouchedBy);
    }
    public function testWithMinData(): void
    {
        $class = new FileMetaType([]);

        $this->assertNull($class->name);
        $this->assertNull($class->thumbnailUrl);
        $this->assertNull($class->role);
        $this->assertNull($class->lastTouchedAt);
        $this->assertNull($class->folderName);
        $this->assertNull($class->version);
        $this->assertNull($class->linkAccess);
        $this->assertNull($class->url);
        $this->assertNull($class->creator);
        $this->assertNull($class->lastTouchedBy);
    }
}
