<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\ArcDataType;
use TypeError;

final class ArcDataTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new ArcDataType([
            'startingAngle' => 10,
            'endingAngle' => 20,
            'innerRadius' => 30,
        ]);
        $this->assertEquals('10', $class->startingAngle);
        $this->assertEquals('20', $class->endingAngle);
        $this->assertEquals('30', $class->innerRadius);
    }
    public function testInvalidStartingAngle(): void
    {
        $this->expectException(TypeError::class);
        new ArcDataType([
            'startingAngle' => 'a',
            'endingAngle' => 20,
            'innerRadius' => 30,
        ]);
    }
    public function testInvalidEndingAngle(): void
    {
        $this->expectException(TypeError::class);
        new ArcDataType([
            'startingAngle' => 10,
            'endingAngle' => '20',
            'innerRadius' => 30,
        ]);
    }
    public function testInvalidInnerRadius(): void
    {
        $this->expectException(TypeError::class);
        new ArcDataType([
            'startingAngle' => 10,
            'endingAngle' => 20,
            'innerRadius' => '30',
        ]);
    }
}
