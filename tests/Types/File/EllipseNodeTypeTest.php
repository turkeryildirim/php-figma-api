<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\ArcDataType;
use Turker\FigmaAPI\Types\File\EllipseNodeType;
use TypeError;

final class EllipseNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new EllipseNodeType([
            'layoutGrow' => 5,
            'id' => 'id',
            'arcData' => [
                'startingAngle' => 10,
                'endingAngle' => 20,
                'innerRadius' => 30,
            ]
        ]);
        $this->assertInstanceOf(ArcDataType::class, $class->arcData);
        $this->assertEquals('5', $class->layoutGrow);
        $this->assertEquals('id', $class->id);
        $this->assertEquals('30', $class->arcData->innerRadius);
        $this->assertEquals('20', $class->arcData->endingAngle);
        $this->assertEquals('10', $class->arcData->startingAngle);
    }
    public function testInvalidArcData(): void
    {
        $this->expectException(TypeError::class);
         new EllipseNodeType([
            'layoutGrow' => 5,
            'id' => 'id',
            'arcData' => 'arcData',
         ]);
    }
}
