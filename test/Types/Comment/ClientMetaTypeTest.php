<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\Comment;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Comment\ClientMetaType;
use Turker\FigmaAPI\Types\Comment\FrameOffsetRegionType;
use Turker\FigmaAPI\Types\Comment\FrameOffsetType;
use Turker\FigmaAPI\Types\Comment\RegionType;
use Turker\FigmaAPI\Types\Common\VectorType;

final class ClientMetaTypeTest extends AbstractBaseTestCase
{
    public function testFrameOffsetRegionType(): void
    {
        $arrayVar = [
            'node_id' => 'node_id',
            'node_offset' => ['x' => 10, 'y' => 50],
            'region_height' => 50,
            'region_width' => 25,
            'comment_pin_corner' => 'bottom-right',
        ];
        $class    = new ClientMetaType($arrayVar);

        $this->assertInstanceOf(FrameOffsetRegionType::class, $class->clientMeta);
        $this->assertEquals('node_id', $class->clientMeta->nodeId);
        $this->assertEquals('10', $class->clientMeta->nodeOffset->x);
        $this->assertEquals('50', $class->clientMeta->nodeOffset->y);
        $this->assertEquals('50', $class->clientMeta->regionHeight);
        $this->assertEquals('25', $class->clientMeta->regionWidth);
        $this->assertEquals('bottom-right', $class->clientMeta->commentPinCorner);
    }
    public function testRegionType(): void
    {
        $arrayVar = [
            'x' => 10,
            'y' => 50,
            'region_height' => 50,
            'region_width' => 25,
            'comment_pin_corner' => 'bottom-right',
        ];
        $class    = new ClientMetaType($arrayVar);
        $this->assertInstanceOf(RegionType::class, $class->clientMeta);
        $this->assertEquals('10', $class->clientMeta->x);
        $this->assertEquals('50', $class->clientMeta->y);
        $this->assertEquals('50', $class->clientMeta->regionHeight);
        $this->assertEquals('25', $class->clientMeta->regionWidth);
        $this->assertEquals('bottom-right', $class->clientMeta->commentPinCorner);
    }
    public function testFrameOffsetType(): void
    {
        $arrayVar = [
            'node_id' => 'node_id',
            'node_offset' => ['x' => 10, 'y' => 50],
        ];
        $class    = new ClientMetaType($arrayVar);
        $this->assertInstanceOf(FrameOffsetType::class, $class->clientMeta);
        $this->assertEquals('node_id', $class->clientMeta->nodeId);
        $this->assertEquals('10', $class->clientMeta->nodeOffset->x);
        $this->assertEquals('50', $class->clientMeta->nodeOffset->y);
    }
    public function testVectorType(): void
    {
        $class = new ClientMetaType(['x' => 10,'y' => 50]);
        $this->assertInstanceOf(VectorType::class, $class->clientMeta);
        $this->assertEquals('10', $class->clientMeta->x);
        $this->assertEquals('50', $class->clientMeta->y);
    }
}
