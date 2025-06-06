<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\MeasurementOffsetInnerType;
use TypeError;

final class MeasurementOffsetInnerTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new MeasurementOffsetInnerType([
            'relative' => 10
        ]);
        $this->assertEquals('10', $class->relative);
        $this->assertEquals('INNER', $class->type);
    }
    public function testInvalidRelative(): void
    {
        $class = new MeasurementOffsetInnerType([
            'relative' => 'a'
        ]);
        $this->assertNull($class->relative);
    }
}
