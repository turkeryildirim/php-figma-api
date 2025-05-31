<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\FlowStartingPointsType;
use TypeError;

final class FlowStartingPointsTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new FlowStartingPointsType([
            'node_id' => 'node_id',
            'name' => 'name',
        ]);
        $this->assertEquals('node_id', $class->nodeId);
        $this->assertEquals('name', $class->name);
    }
}
