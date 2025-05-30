<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\Component;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Component\ComponentType;
use Turker\FigmaAPI\Types\Component\FrameInfoType;
use Turker\FigmaAPI\Types\File\ColorType;
use Turker\FigmaAPI\Types\User\UserType;
use TypeError;

final class ComponentTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $arrayVar = [
            'key' => 'key',
            'name' => 'name',
            'description' => 'description',
            'file_key' => 'file_key',
            'node_id' => 'node_id',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
            'user' => ['id' => 'id', 'handle' => 'handle', 'img_url' => 'img_url'],
            'thumbnail_url' => 'thumbnail_url',
            'containing_frame' => [
                'pageId' => 'pageId',
                'pageName' => 'pageName',
                'nodeId' => 'nodeId',
                'name' => 'name',
                'backgroundColor' => [
                    'r' => 0,
                    'g' => 0,
                    'b' => 0,
                    'a' => 0,
                ],
                'containing_component_set' => 'containingComponentSet'
            ]
        ];

        $class = new ComponentType($arrayVar);

        $this->assertEquals('key', $class->key);
        $this->assertEquals('name', $class->name);
        $this->assertEquals('description', $class->description);
        $this->assertEquals('file_key', $class->filekey);
        $this->assertEquals('node_id', $class->nodeId);
        $this->assertEquals('thumbnail_url', $class->thumbnailUrl);
        $this->assertEquals('created_at', $class->createdAt);
        $this->assertEquals('updated_at', $class->updatedAt);

        $this->assertInstanceOf(UserType::class, $class->user);
        $this->assertEquals('id', $class->user->id);
        $this->assertEquals('img_url', $class->user->imgUrl);
        $this->assertEquals('handle', $class->user->handle);
        $this->assertNull($class->user->email);

        $this->assertInstanceOf(FrameInfoType::class, $class->containingFrame);
        $this->assertEquals('name', $class->containingFrame->name);
        $this->assertEquals('pageId', $class->containingFrame->pageId);
        $this->assertEquals('pageName', $class->containingFrame->pageName);
        $this->assertEquals('nodeId', $class->containingFrame->nodeId);
        $this->assertEquals('containingComponentSet', $class->containingFrame->containingComponentSet);

        $this->assertInstanceOf(ColorType::class, $class->containingFrame->backgroundColor);
        $this->assertEquals('0', $class->containingFrame->backgroundColor->r);
        $this->assertEquals('0', $class->containingFrame->backgroundColor->g);
        $this->assertEquals('0', $class->containingFrame->backgroundColor->b);
        $this->assertEquals('0', $class->containingFrame->backgroundColor->a);
    }
    public function testWithMinData(): void
    {
        $arrayVar = [
            'key' => 'key',
            'created_at' => 'created_at',
            'user' => ['id' => 'id'],
            'containing_frame' => ['nodeId' => 'nodeId']
        ];
        $class    = new ComponentType($arrayVar);

        $this->assertEquals('key', $class->key);
        $this->assertEquals('created_at', $class->createdAt);
        $this->assertNull($class->name);
        $this->assertNull($class->description);
        $this->assertNull($class->filekey);
        $this->assertNull($class->nodeId);
        $this->assertNull($class->thumbnailUrl);
        $this->assertNull($class->updatedAt);

        $this->assertInstanceOf(UserType::class, $class->user);
        $this->assertEquals('id', $class->user->id);
        $this->assertNull($class->user->imgUrl);
        $this->assertNull($class->user->handle);
        $this->assertNull($class->user->email);

        $this->assertInstanceOf(FrameInfoType::class, $class->containingFrame);
        $this->assertEquals('nodeId', $class->containingFrame->nodeId);
        $this->assertNull($class->containingFrame->name);
        $this->assertNull($class->containingFrame->pageId);
        $this->assertNull($class->containingFrame->pageName);
        $this->assertNull($class->containingFrame->backgroundColor);
    }
    public function testInvalidContainingFrame()
    {
        $class = new ComponentType([
            'key' => 'key',
            'created_at' => 'created_at',
            'user' => ['id' => 'id'],
            'containing_frame' => 'a'
        ]);
        $this->assertNull($class->containingFrame);
    }
}
