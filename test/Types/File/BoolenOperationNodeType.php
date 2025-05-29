<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\BooleanOperationNodeType;
use TypeError;

final class BoolenOperationNodeType extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new BoolenOperationNodeType(['id' => 'id', 'booleanOperation' => 'UNION']);
        $this->assertEquals('UNION', $class->booleanOperation->value);
    }
    public function testInvalidBooleanOperation(): void
    {
        $this->expectException(TypeError::class);
        new BoolenOperationNodeType(['id' => 'id','booleanOperation' => 50]);
    }
}
