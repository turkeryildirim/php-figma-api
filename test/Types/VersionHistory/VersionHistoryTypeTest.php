<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\VersionHistory;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\User\UserType;
use Turker\FigmaAPI\Types\VersionHistory\VersionHistoryType;
use TypeError;

final class VersionHistoryTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $arrayVar = [
            'id' => 'id',
            'created_at' => 'created_at',
            'label' => 'label',
            'description' => 'description',
            'user' => ['id' => 'id', 'handle' => 'handle', 'img_url' => 'img_url'],
        ];
        $class    = new VersionHistoryType($arrayVar);

        $this->assertEquals('id', $class->id);
        $this->assertEquals('created_at', $class->createdAt);
        $this->assertEquals('label', $class->label);
        $this->assertEquals('description', $class->description);

        $this->assertInstanceOf(UserType::class, $class->user);
        $this->assertNull($class->user->email);
        $this->assertEquals('id', $class->user->id);
        $this->assertEquals('handle', $class->user->handle);
        $this->assertEquals('img_url', $class->user->imgUrl);
    }
    public function testWithMinData(): void
    {
        $arrayVar = [
            'id' => 'id',
            'created_at' => 'created_at',
            'user' => ['id' => 'id'],
        ];
        $class    = new VersionHistoryType($arrayVar);

        $this->assertEquals('id', $class->id);
        $this->assertEquals('created_at', $class->createdAt);
        $this->assertNull($class->label);
        $this->assertNull($class->description);

        $this->assertInstanceOf(UserType::class, $class->user);
        $this->assertEquals('id', $class->user->id);
        $this->assertNull($class->user->email);
        $this->assertNull($class->user->handle);
        $this->assertNull($class->user->imgUrl);
    }
    public function testMissingIdField()
    {
        $this->expectException(TypeError::class);
        new VersionHistoryType(['created_at' => 'created_at','user' => ['id' => 'id']]);
    }
    public function testMissingCreatedAtField()
    {
        $this->expectException(TypeError::class);
        new VersionHistoryType(['user' => ['id' => 'id']]);
    }
    public function testInvalidLabel(): void
    {
        $this->expectException(TypeError::class);
        new VersionHistoryType([
            'label' => 10,
            'id' => 'id',
            'created_at' => 'created_at',
            'user' => ['id' => 'id'],
        ]);
    }
}
