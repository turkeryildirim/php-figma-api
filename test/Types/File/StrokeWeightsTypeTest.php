<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\StrokeWeightsType;
use TypeError;

final class StrokeWeightsTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new StrokeWeightsType([
            'top' => 10,
            'right' => 20,
            'bottom' => 30,
            'left' => 40,
        ]);
        $this->assertEquals('10', $class->top);
        $this->assertEquals('20', $class->right);
        $this->assertEquals('30', $class->bottom);
        $this->assertEquals('40', $class->left);
    }
    public function testInvalidTop(): void
    {
        $this->expectException(TypeError::class);
        new StrokeWeightsType([
            'top' => 'a',
            'right' => 20,
            'bottom' => 30,
            'left' => 40,
        ]);
    }
    public function testInvalidRight(): void
    {
        $this->expectException(TypeError::class);
        new StrokeWeightsType([
            'right' => 'a',
            'top' => 20,
            'bottom' => 30,
            'left' => 40,
        ]);
    }
    public function testInvalidBottom(): void
    {
        $this->expectException(TypeError::class);
        new StrokeWeightsType([
            'bottom' => 'a',
            'right' => 20,
            'top' => 30,
            'left' => 40,
        ]);
    }
    public function testInvalidLeft(): void
    {
        $this->expectException(TypeError::class);
        new StrokeWeightsType([
            'left' => 'a',
            'right' => 20,
            'bottom' => 30,
            'top' => 40,
        ]);
    }
}
