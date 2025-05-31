<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
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
        $class = new ImageFiltersType(['exposure' => 'aaa']);
        $this->assertEquals('0', $class->exposure);
    }
    public function testInvalidContrast(): void
    {
        $class = new ImageFiltersType(['contrast' => 'aaa']);
        $this->assertEquals('0', $class->contrast);
    }
    public function testInvalidSaturation(): void
    {
        $class = new ImageFiltersType(['saturation' => 'aaa']);
        $this->assertEquals('0', $class->saturation);
    }
    public function testInvalidTemperature(): void
    {
        $class = new ImageFiltersType(['temperature' => 'aaa']);
        $this->assertEquals('0', $class->temperature);
    }
    public function testInvalidTint(): void
    {
        $class = new ImageFiltersType(['tint' => 'aaa']);
        $this->assertEquals('0', $class->tint);
    }
    public function testInvalidHighlights(): void
    {
        $class = new ImageFiltersType(['highlights' => 'aaa']);
        $this->assertEquals('0', $class->highlights);
    }
    public function testInvalidShadows(): void
    {
        $class = new ImageFiltersType(['shadows' => 'aaa']);
        $this->assertEquals('0', $class->shadows);
    }
}
