<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\ColorStopType;
use Turker\FigmaAPI\Types\File\ColorType;
use Turker\FigmaAPI\Types\File\VariableAliasType;
use TypeError;

final class ColorStopTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new ColorStopType([
            'position' => 10,
            'color' => ['r' => 1, 'g' => 2, 'b' => 3, 'a' => 4],
            'boundVariables' => [['id' => 'id', 'type' => 'type',]]
        ]);
        $this->assertEquals('10', $class->position);
        $this->assertIsArray($class->boundVariables);
        $this->assertInstanceOf(VariableAliasType::class, $class->boundVariables[0]);
        $this->assertInstanceOf(ColorType::class, $class->color);
        $this->assertEquals('1', $class->color->r);
        $this->assertEquals('2', $class->color->g);
        $this->assertEquals('3', $class->color->b);
        $this->assertEquals('4', $class->color->a);
        $this->assertEquals('type', $class->boundVariables[0]->type);
        $this->assertEquals('id', $class->boundVariables[0]->id);
    }
    public function testWithMinData(): void
    {
        $class = new ColorStopType([
            'position' => 10
        ]);
        $this->assertEquals('10', $class->position);

        $this->assertNull($class->boundVariables);
        $this->assertNull($class->color);
    }
    public function testInvalidPosition(): void
    {
        $class = new ColorStopType(['position' => 'position']);
        $this->assertNull($class->color);
    }
}
