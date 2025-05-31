<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Traits;

use Turker\FigmaAPI\Enums\Comment\CommentPinCornerEnum;
use Turker\FigmaAPI\Tests\AbstractBaseTestCase;

final class EnumToArrayTraitTest extends AbstractBaseTestCase
{
    public function testNames()
    {
        $array = CommentPinCornerEnum::names();
        $this->assertIsArray($array);
        $this->assertCount(4, $array);
        $this->assertEquals('BOTTOM_RIGHT', $array[0]);
        $this->assertEquals('BOTTOM_LEFT', $array[1]);
    }

    public function testValues()
    {
        $array = CommentPinCornerEnum::values();
        $this->assertIsArray($array);
        $this->assertCount(4, $array);
        $this->assertEquals('bottom-right', $array[0]);
        $this->assertEquals('bottom-left', $array[1]);
    }

    public function testAsArray()
    {
        $array = CommentPinCornerEnum::asArray();
        $this->assertIsArray($array);
        $this->assertCount(4, $array);
        $this->assertEquals('bottom-right', $array['BOTTOM_RIGHT']);
        $this->assertEquals('bottom-left', $array['BOTTOM_LEFT']);
    }

    public function testHasValue()
    {
        $test1 = CommentPinCornerEnum::hasValue('bottom-right');
        $test2 = CommentPinCornerEnum::hasValue('NONE');
        $this->assertTrue($test1);
        $this->assertFalse($test2);
    }

    public function testHasName()
    {
        $test1 = CommentPinCornerEnum::hasName('BOTTOM_RIGHT');
        $test2 = CommentPinCornerEnum::hasName('NONE');
        $this->assertTrue($test1);
        $this->assertFalse($test2);
    }
}
