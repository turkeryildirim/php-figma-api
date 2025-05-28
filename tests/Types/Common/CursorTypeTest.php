<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\Common;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Common\CursorType;
use TypeError;

final class CursorTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new CursorType([ 'before' => 'before', 'after' => 'after']);
        $this->assertEquals('before', $class->before);
        $this->assertEquals('after', $class->after);
    }
    public function testWithMinData(): void
    {
        $class = new CursorType([]);
        $this->assertNull($class->before);
        $this->assertNull($class->after);
    }
    public function testInvalidBefore(): void
    {
        $this->expectException(TypeError::class);
        new CursorType([ 'before' => [], 'after' => 'after']);
    }
    public function testInvalidAfter(): void
    {
        $this->expectException(TypeError::class);
        new CursorType([ 'after' => [], 'before' => 'before']);
    }
}
