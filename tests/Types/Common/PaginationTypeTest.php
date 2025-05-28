<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\Common;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Common\PaginationType;
use TypeError;

final class PaginationTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new PaginationType(['next_page' => 'next_page', 'prev_page' => 'prev_page']);
        $this->assertEquals('next_page', $class->nextPage);
        $this->assertEquals('prev_page', $class->prevPage);
    }
    public function testWithMinData(): void
    {
        $class = new PaginationType([]);
        $this->assertNull($class->nextPage);
        $this->assertNull($class->prevPage);
    }
    public function testInvalidNextPage(): void
    {
        $this->expectException(TypeError::class);
        new PaginationType(['next_page' => 5, 'prev_page' => 'prev_page']);
    }
    public function testInvalidPrevPage(): void
    {
        $this->expectException(TypeError::class);
        new PaginationType(['prev_page' => 5, 'next_page' => 'next_page']);
    }
}
