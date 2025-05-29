<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\Comment;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Comment\ReactionType;
use Turker\FigmaAPI\Types\User\UserType;
use TypeError;

final class ReactionTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $arrayVar = [
            'emoji' => 'emoji',
            'created_at' => 'created_at',
            'user' => [
                'id' => 'id',
                'handle' => 'handle',
                'img_url' => 'img_url',
            ],
        ];

        $class = new ReactionType($arrayVar);

        $this->assertEquals('emoji', $class->emoji);
        $this->assertEquals('created_at', $class->createdAt);

        $this->assertInstanceOf(UserType::class, $class->user);
        $this->assertNull($class->user->email);
        $this->assertEquals('id', $class->user->id);
        $this->assertEquals('handle', $class->user->handle);
        $this->assertEquals('img_url', $class->user->imgUrl);
    }
    public function testWithMinData(): void
    {
        $arrayVar = [
            'emoji' => 'emoji',
            'created_at' => 'created_at',
            'user' => ['id' => 'id'],
        ];

        $class = new ReactionType($arrayVar);

        $this->assertEquals('emoji', $class->emoji);
        $this->assertEquals('created_at', $class->createdAt);

        $this->assertInstanceOf(UserType::class, $class->user);
        $this->assertEquals('id', $class->user->id);
        $this->assertNull($class->user->email);
        $this->assertNull($class->user->handle);
        $this->assertNull($class->user->imgUrl);
    }
    public function testMissingEmojiField()
    {
        $this->expectException(TypeError::class);
        $arrayVar = [
            'created_at' => 'created_at',
            'user' => ['id' => 'id'],
        ];
        new ReactionType($arrayVar);
    }
    public function testInvalidEmoji()
    {
        $this->expectException(TypeError::class);
        $arrayVar = [
            'created_at' => 'created_at',
            'user' => ['id' => 'id'],
            'emoji' => 5,
        ];
        new ReactionType($arrayVar);
    }
}
