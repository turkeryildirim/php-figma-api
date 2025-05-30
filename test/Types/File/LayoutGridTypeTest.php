<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\LayoutGridType;
use TypeError;

final class LayoutGridTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new LayoutGridType([
            'visible' => false,
            'color' => ['r' => 15, 'g' => 25, 'b' => 35, 'a' => 45],
            'boundVariables' => [['id' => 'id', 'type' => 'type']],
            'pattern' => 'COLUMNS',
            'alignment' => 'MAX',
            'sectionSize' => 5,
            'gutterSize' => 4,
            'offset' => 3,
            'count' => 2,
        ]);
        $this->assertFalse($class->visible);
        $this->assertEquals('MAX', $class->alignment);
        $this->assertEquals('COLUMNS', $class->pattern);
        $this->assertEquals(5, $class->sectionSize);
        $this->assertEquals(4, $class->gutterSize);
        $this->assertEquals(3, $class->offset);
        $this->assertEquals(2, $class->count);
        $this->assertEquals('15', $class->color->r);
        $this->assertEquals('25', $class->color->g);
        $this->assertEquals('35', $class->color->b);
        $this->assertEquals('45', $class->color->a);
        $this->assertEquals('type', $class->boundVariables[0]->type);
        $this->assertEquals('id', $class->boundVariables[0]->id);
    }
    public function testWithMinData(): void
    {
        $class = new LayoutGridType([
            'pattern' => 'COLUMNS',
            'alignment' => 'MAX',
            'sectionSize' => 5,
            'gutterSize' => 4,
            'offset' => 3,
            'count' => 2,
        ]);
        $this->assertTrue($class->visible);
        $this->assertNull($class->color);
        $this->assertNull($class->boundVariables);
        $this->assertEquals('MAX', $class->alignment);
        $this->assertEquals('COLUMNS', $class->pattern);
        $this->assertEquals(5, $class->sectionSize);
        $this->assertEquals(4, $class->gutterSize);
        $this->assertEquals(3, $class->offset);
        $this->assertEquals(2, $class->count);
    }
    public function testInvalidCount(): void
    {
        $class = new LayoutGridType([
            'pattern' => 'COLUMNS',
            'alignment' => 'MAX',
            'sectionSize' => 5,
            'gutterSize' => 4,
            'offset' => 3,
            'count' => 'a',
        ]);
        $this->assertNull($class->count);
    }
    public function testInvalidOffset(): void
    {
        $class = new LayoutGridType([
            'pattern' => 'COLUMNS',
            'alignment' => 'MAX',
            'sectionSize' => 5,
            'gutterSize' => 4,
            'offset' => 'a',
            'count' => 1,
        ]);
        $this->assertNull($class->offset);
    }
    public function testInvalidGutterSize(): void
    {
        $class = new LayoutGridType([
            'pattern' => 'COLUMNS',
            'alignment' => 'MAX',
            'sectionSize' => 5,
            'offset' => 4,
            'gutterSize' => 'a',
            'count' => 1,
        ]);
        $this->assertNull($class->gutterSize);
    }
    public function testInvalidSectionSize(): void
    {
        $class = new LayoutGridType([
            'pattern' => 'COLUMNS',
            'alignment' => 'MAX',
            'gutterSize' => 5,
            'offset' => 4,
            'sectionSize' => 'a',
            'count' => 1,
        ]);
        $this->assertNull($class->sectionSize);
    }
    public function testInvalidAlignment(): void
    {
        $class = new LayoutGridType([
            'pattern' => 'COLUMNS',
            'alignment' => 'a',
            'gutterSize' => 5,
            'offset' => 4,
            'sectionSize' => 2,
            'count' => 1,
        ]);
        $this->assertNull($class->alignment);
    }
    public function testInvalidPattern(): void
    {
        $class = new LayoutGridType([
            'pattern' => 'a',
            'alignment' => 'MAX',
            'gutterSize' => 5,
            'offset' => 4,
            'sectionSize' => 2,
            'count' => 1,
        ]);
        $this->assertNull($class->pattern);
    }
}
