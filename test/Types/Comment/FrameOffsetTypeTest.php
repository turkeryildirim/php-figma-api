<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\Comment;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Comment\FrameOffsetType;
use Turker\FigmaAPI\Types\Common\VectorType;

final class FrameOffsetTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $arrayVar = [
            'node_id' => 'node_id',
            'node_offset' => ['x' => 10, 'y' => 50],
        ];
        $class    = new FrameOffsetType($arrayVar);

        $this->assertEquals('node_id', $class->nodeId);
        $this->assertInstanceOf(VectorType::class, $class->nodeOffset);
        $this->assertEquals('10', $class->nodeOffset->x);
        $this->assertEquals('50', $class->nodeOffset->y);
    }
    public function testWithMinData(): void
    {
        $class = new FrameOffsetType([]);
        $this->assertNull($class->nodeId);
        $this->assertNull($class->nodeOffset);
    }
}
