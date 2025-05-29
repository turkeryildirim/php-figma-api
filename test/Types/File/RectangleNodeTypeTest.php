<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\RectangleNodeType;
use TypeError;

final class RectangleNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new RectangleNodeType([
            'id' => 'id',
            'cornerRadius' => 10,
            'cornerSmoothing' => 15,
            'rectangleCornerRadii' => [5,6],
        ]);
        $this->assertEquals('10', $class->cornerRadius);
        $this->assertEquals('15', $class->cornerSmoothing);
        $this->assertEquals('5', $class->rectangleCornerRadii[0]);
    }
    public function testWithMinData(): void
    {
        $class = new RectangleNodeType(['id' => 'id']);
        $this->assertNull($class->cornerRadius);
        $this->assertEquals('0', $class->cornerSmoothing);
        $this->assertNull($class->rectangleCornerRadii);
    }
}
