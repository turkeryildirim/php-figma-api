<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\Common;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Common\VectorType;

final class VectorTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new VectorType([ 'x' => 10, 'y' => 20]);
        $this->assertEquals('10', $class->x);
        $this->assertEquals('20', $class->y);
    }
    public function testWithMinData(): void
    {
        $class = new VectorType([]);
        $this->assertEquals('0', $class->x);
        $this->assertEquals('0', $class->y);
    }
}
