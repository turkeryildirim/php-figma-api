<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\BooleanOperationNodeType;
use TypeError;

final class BoolenOperationNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new BooleanOperationNodeType(['id' => 'id', 'booleanOperation' => 'UNION']);
        $this->assertEquals('UNION', $class->booleanOperation);
    }
    public function testInvalidBooleanOperation(): void
    {
        $this->expectException(TypeError::class);
        new BooleanOperationNodeType(['id' => 'id','booleanOperation' => 50]);
    }
}
