<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\Style;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Style\StyleType;
use Turker\FigmaAPI\Types\User\UserType;
use TypeError;

final class StyleTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $arrayVar = [
            'key' => 'key',
            'file_key' => 'file_key',
            'node_id' => 'node_id',
            'style_type' => 'FILL',
            'thumbnail_url' => 'thumbnail_url',
            'name' => 'name',
            'description' => 'description',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
            'user' => ['id' => 'id', 'handle' => 'handle', 'img_url' => 'img_url'],
            'sort_position' => 'sort_position',
        ];
        $class    = new StyleType($arrayVar);

        $this->assertEquals('key', $class->key);
        $this->assertEquals('file_key', $class->filekey);
        $this->assertEquals('node_id', $class->nodeId);
        $this->assertEquals('thumbnail_url', $class->thumbnailUrl);
        $this->assertEquals('name', $class->name);
        $this->assertEquals('description', $class->description);
        $this->assertEquals('created_at', $class->createdAt);
        $this->assertEquals('updated_at', $class->updatedAt);
        $this->assertEquals('sort_position', $class->sortPosition);
        $this->assertEquals('FILL', $class->styleType);

        $this->assertInstanceOf(UserType::class, $class->user);
        $this->assertEquals('id', $class->user->id);
        $this->assertEquals('img_url', $class->user->imgUrl);
        $this->assertEquals('handle', $class->user->handle);
        $this->assertNull($class->user->email);
    }
    public function testWithMinData(): void
    {
        $arrayVar = [
            'key' => 'key',
            'created_at' => 'created_at',
            'user' => ['id' => 'id']
        ];
        $class    = new StyleType($arrayVar);

        $this->assertEquals('key', $class->key);
        $this->assertEquals('created_at', $class->createdAt);
        $this->assertNull($class->filekey);
        $this->assertNull($class->nodeId);
        $this->assertNull($class->thumbnailUrl);
        $this->assertNull($class->name);
        $this->assertNull($class->description);
        $this->assertNull($class->updatedAt);
        $this->assertNull($class->sortPosition);
        $this->assertNull($class->styleType);

        $this->assertInstanceOf(UserType::class, $class->user);
        $this->assertEquals('id', $class->user->id);
        $this->assertNull($class->user->imgUrl);
        $this->assertNull($class->user->handle);
        $this->assertNull($class->user->email);
    }
    public function testMissingKeyField()
    {
        $this->expectException(TypeError::class);
        new StyleType([
            'created_at' => 'created_at',
            'user' => ['id' => 'id'],
        ]);
    }
    public function testMissingUserField()
    {
        $this->expectException(TypeError::class);
        new StyleType([
            'key' => 'key',
            'created_at' => 'created_at'
        ]);
    }
    public function testInvalidSortPosition()
    {
        $this->expectException(TypeError::class);
        new StyleType([
            'sort_position' => 10,
            'key' => 'key',
            'created_at' => 'created_at',
            'user' => ['id' => 'id'],
        ]);
    }
}
