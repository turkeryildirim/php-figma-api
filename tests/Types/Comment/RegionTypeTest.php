<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\Comment;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Comment\RegionType;

final class RegionTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $arrayVar = [
            'x' => 100,
            'y' => 120,
            'region_height' => 50,
            'region_width' => 25,
            'comment_pin_corner' => 'bottom-right',
        ];

        $class = new RegionType($arrayVar);

        $this->assertEquals('100', $class->x);
        $this->assertEquals('120', $class->y);
        $this->assertEquals('50', $class->regionHeight);
        $this->assertEquals('25', $class->regionWidth);
        $this->assertEquals('bottom-right', $class->commentPinCorner->value);
    }
    public function testWithMinData(): void
    {
        $class = new RegionType([]);
        $this->assertEquals('0', $class->x);
        $this->assertEquals('0', $class->y);
        $this->assertEquals('0', $class->regionHeight);
        $this->assertEquals('0', $class->regionWidth);
        $this->assertNull($class->commentPinCorner);
    }
}
