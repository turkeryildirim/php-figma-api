<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\ImageFiltersType;
use TypeError;

final class ImageFiltersTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new ImageFiltersType([
            'exposure' => 1,
            'contrast' => 2,
            'saturation' => 3,
            'temperature' => 4,
            'tint' => 5,
            'highlights' => 6,
            'shadows' => 7,
        ]);
        $this->assertEquals('1', $class->exposure);
        $this->assertEquals('2', $class->contrast);
        $this->assertEquals('3', $class->saturation);
        $this->assertEquals('4', $class->temperature);
        $this->assertEquals('5', $class->tint);
        $this->assertEquals('6', $class->highlights);
        $this->assertEquals('7', $class->shadows);
    }
    public function testWithMinData()
    {
        $class = new ImageFiltersType([]);
        $this->assertEquals('0', $class->exposure);
        $this->assertEquals('0', $class->contrast);
        $this->assertEquals('0', $class->saturation);
        $this->assertEquals('0', $class->temperature);
        $this->assertEquals('0', $class->tint);
        $this->assertEquals('0', $class->highlights);
        $this->assertEquals('0', $class->shadows);
    }
    public function testInvalidExposure(): void
    {
        $this->expectException(TypeError::class);
        new ImageFiltersType(['exposure' => '10']);
    }
    public function testInvalidContrast(): void
    {
        $this->expectException(TypeError::class);
        new ImageFiltersType(['contrast' => '10']);
    }
    public function testInvalidSaturation(): void
    {
        $this->expectException(TypeError::class);
        new ImageFiltersType(['saturation' => '10']);
    }
    public function testInvalidTemperature(): void
    {
        $this->expectException(TypeError::class);
        new ImageFiltersType(['temperature' => '10']);
    }
    public function testInvalidTint(): void
    {
        $this->expectException(TypeError::class);
        new ImageFiltersType(['tint' => '10']);
    }
    public function testInvalidHighlights(): void
    {
        $this->expectException(TypeError::class);
        new ImageFiltersType(['highlights' => '10']);
    }
    public function testInvalidShadows(): void
    {
        $this->expectException(TypeError::class);
        new ImageFiltersType(['shadows' => '10']);
    }
}
