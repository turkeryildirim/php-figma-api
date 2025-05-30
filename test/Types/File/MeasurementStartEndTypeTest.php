<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\MeasurementStartEndType;

final class MeasurementStartEndTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new MeasurementStartEndType([
            'node_id' => 'node_id',
            'side' => 'RIGHT',
        ]);
        $this->assertEquals('node_id', $class->nodeId);
        $this->assertEquals('RIGHT', $class->side);
    }
    public function testWithMinData(): void
    {
        $class = new MeasurementStartEndType([]);
        $this->assertNull($class->nodeId);
        $this->assertNull($class->side);
    }
    public function testInvalidSide(): void
    {
        $class = new MeasurementStartEndType([
            'side' => 'a'
        ]);
        $this->assertNull($class->side);
    }
}
