<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\MeasurementOffsetOuterType;
use TypeError;

final class MeasurementOffsetOuterTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new MeasurementOffsetOuterType([
            'fixed' => 10
        ]);
        $this->assertEquals('10', $class->fixed);
        $this->assertEquals('OUTER', $class->type);
    }
    public function testInvalidRelative(): void
    {
        $this->expectException(TypeError::class);
        new MeasurementOffsetOuterType([
            'fixed' => 'a'
        ]);
    }
}
