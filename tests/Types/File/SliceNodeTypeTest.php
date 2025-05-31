<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\SliceNodeType;
use TypeError;

final class SliceNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new SliceNodeType([
            'id' => 'id',
            'absoluteBoundingBox' => ['width' => 10, 'height' => 10, 'x' => 1, 'y' => 2],
            'absoluteRenderBounds' => ['width' => 10, 'height' => 10, 'x' => 1, 'y' => 2],
            'relativeTransform' => '1,2,3,4,5,6,7,8,9',
            'size' => ['x' => 5,'y' => 4],
        ]);
        $this->assertEquals('id', $class->id);
        $this->assertEquals('5', $class->size->x);
        $this->assertEquals('4', $class->size->y);
        $this->assertEquals('2', $class->relativeTransform[0][1]);
        $this->assertEquals('1', $class->absoluteBoundingBox->x);
        $this->assertEquals('2', $class->absoluteBoundingBox->y);
        $this->assertEquals('10', $class->absoluteBoundingBox->width);
        $this->assertEquals('10', $class->absoluteBoundingBox->height);
        $this->assertEquals('1', $class->absoluteRenderBounds->x);
        $this->assertEquals('2', $class->absoluteRenderBounds->y);
        $this->assertEquals('10', $class->absoluteRenderBounds->width);
        $this->assertEquals('10', $class->absoluteRenderBounds->height);
    }
    public function testWithMinData(): void
    {
        $class = new SliceNodeType([ 'id' => 'id']);
        $this->assertEquals('id', $class->id);
        $this->assertNull($class->size);
        $this->assertNull($class->relativeTransform);
        $this->assertNull($class->absoluteBoundingBox);
        $this->assertNull($class->absoluteRenderBounds);
    }
}
