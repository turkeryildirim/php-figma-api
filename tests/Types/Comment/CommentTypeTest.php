<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\Comment;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Comment\CommentType;
use Turker\FigmaAPI\Types\Common\VectorType;
use Turker\FigmaAPI\Types\User\UserType;
use TypeError;

final class CommentTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $arrayVar = [
            'id' => 'id',
            'file_key' => 'file_key',
            'created_at' => 'created_at',
            'uuid' => 'uuid',
            'message' => 'message',
            'parent_id' => 'parent_id',
            'order_id' => 5,
            'client_meta' => ['x' => 5, 'y' => 15],
            'reactions' => [
                [
                    'emoji' => 'emoji',
                    'created_at' => 'created_at',
                    'user' => ['id' => 'id','handle' => 'handle','img_url' => 'img_url']
                ]
            ],
            'user' => ['id' => 'id', 'handle' => 'handle', 'img_url' => 'img_url']
        ];
        $class = new CommentType($arrayVar);

        $this->assertEquals('id', $class->id);
        $this->assertEquals('file_key', $class->filekey);
        $this->assertEquals('uuid', $class->uuid);
        $this->assertEquals('created_at', $class->createdAt);
        $this->assertEquals('message', $class->message);
        $this->assertEquals('parent_id', $class->parentId);
        $this->assertEquals('5', $class->orderId);

        $this->assertIsArray($class->reactions);
        $this->assertEquals('emoji', $class->reactions[0]->emoji);
        $this->assertEquals('created_at', $class->reactions[0]->createdAt);

        $this->assertInstanceOf(UserType::class, $class->reactions[0]->user);
        $this->assertNull($class->reactions[0]->user->email);
        $this->assertEquals('id', $class->reactions[0]->user->id);
        $this->assertEquals('handle', $class->reactions[0]->user->handle);
        $this->assertEquals('img_url', $class->reactions[0]->user->imgUrl);


        $this->assertInstanceOf(VectorType::class, $class->clientMeta);
        $this->assertEquals('5', $class->clientMeta->x);
        $this->assertEquals('15', $class->clientMeta->y);

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
            'order_id' => 5,
            'client_meta' => ['x' => 5, 'y' => 15],
            'user' => ['id' => 'id']
        ];
        $class = new CommentType($arrayVar);

        $this->assertEquals('id', $class->id);
        $this->assertEquals('created_at', $class->createdAt);
        $this->assertEquals('5', $class->orderId);
        $this->assertInstanceOf(VectorType::class, $class->clientMeta);
        $this->assertEquals('5', $class->clientMeta->x);
        $this->assertEquals('15', $class->clientMeta->y);

        $this->assertInstanceOf(UserType::class, $class->user);
        $this->assertEquals('id', $class->user->id);
        $this->assertNull($class->user->email);
        $this->assertNull($class->user->handle);
        $this->assertNull($class->user->imgUrl);

        $this->assertNull($class->filekey);
        $this->assertNull($class->uuid);
        $this->assertNull($class->message);
        $this->assertNull($class->parentId);
        $this->assertNull($class->reactions);
    }
    public function testMissingClientMetaField()
    {
        $this->expectException(TypeError::class);
        $arrayVar = [
            'id' => 'id',
            'user' => ['id' => 'id'],
            'created_at' => 'created_at',
        ];
        new CommentType($arrayVar);
    }
    public function testMissingOrderIdField()
    {
        $arrayVar = [
            'id' => 'id',
            'user' => ['id' => 'id'],
            'created_at' => 'created_at',
            'client_meta' => ['x' => 5, 'y' => 15],
        ];
        $class = new CommentType($arrayVar);
        $this->assertEquals('0', $class->orderId);
    }
    public function testInvalidResolvedAt()
    {
        $this->expectException(TypeError::class);
        new CommentType([
            'resolved_at' => 5,
            'id' => 'id',
            'created_at' => 'created_at',
            'order_id' => 5,
            'client_meta' => ['x' => 5, 'y' => 15],
            'user' => ['id' => 'id']
        ]);
    }
    public function testInvalidUuid()
    {
        $this->expectException(TypeError::class);
        new CommentType([
            'uuid' => 5,
            'id' => 'id',
            'created_at' => 'created_at',
            'order_id' => 5,
            'client_meta' => ['x' => 5, 'y' => 15],
            'user' => ['id' => 'id']
        ]);
    }
    public function testInvalidMessage()
    {
        $this->expectException(TypeError::class);
        new CommentType([
            'message' => 5,
            'id' => 'id',
            'created_at' => 'created_at',
            'order_id' => 5,
            'client_meta' => ['x' => 5, 'y' => 15],
            'user' => ['id' => 'id']
        ]);
    }
    public function testInvalidOrderId()
    {
        $class = new CommentType([
            'orderId' => 'id',
            'id' => 'id',
            'created_at' => 'created_at',
            'client_meta' => ['x' => 5, 'y' => 15],
            'user' => ['id' => 'id']
        ]);
        $this->assertEquals(0, $class->orderId);
    }
    public function testInvalidParentId()
    {
        $this->expectException(TypeError::class);
        new CommentType([
            'parent_id' => 5,
            'id' => 'id',
            'created_at' => 'created_at',
            'order_id' => 5,
            'client_meta' => ['x' => 5, 'y' => 15],
            'user' => ['id' => 'id']
        ]);
    }
}
