<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\Comment;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Comment\FrameOffsetRegionType;
use Turker\FigmaAPI\Types\Common\VectorType;

final class FrameOffsetRegionTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $arrayVar = [
            'node_id' => 'node_id',
            'node_offset' => ['x' => 10, 'y' => 50],
            'region_height' => 50,
            'region_width' => 25,
            'comment_pin_corner' => 'bottom-right',
        ];
        $class    = new FrameOffsetRegionType($arrayVar);

        $this->assertEquals('node_id', $class->nodeId);
        $this->assertInstanceOf(VectorType::class, $class->nodeOffset);
        $this->assertEquals('10', $class->nodeOffset->x);
        $this->assertEquals('50', $class->nodeOffset->y);
        $this->assertEquals('50', $class->regionHeight);
        $this->assertEquals('25', $class->regionWidth);
        $this->assertEquals('bottom-right', $class->commentPinCorner->value);
    }
    public function testWithMinData(): void
    {
        $class = new FrameOffsetRegionType([]);
        $this->assertNull($class->nodeId);
        $this->assertNull($class->nodeOffset);
        $this->assertEquals('0', $class->regionHeight);
        $this->assertEquals('0', $class->regionWidth);
        $this->assertNull($class->commentPinCorner);
    }
}
