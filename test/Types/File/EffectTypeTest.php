<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Common\VectorType;
use Turker\FigmaAPI\Types\File\ColorType;
use Turker\FigmaAPI\Types\File\EffectType;
use Turker\FigmaAPI\Types\File\VariableAliasType;
use TypeError;
use ValueError;

final class EffectTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new EffectType([
            'visible' => true,
            'color' => ['r' => 10, 'g' => 20, 'b' => 30, 'a' => 40],
            'blendMode' => 'DARKEN',
            'boundVariables' => [['id' => 'id', 'type' => 'type']],
            'type' => 'INNER_SHADOW',
            'radius' => 55,
            'showShadowBehindNode' => true,
            'offset' => ['x' => 5,'y' => 4],
            'spread' => 20,
        ]);
        $this->assertInstanceOf(VariableAliasType::class, $class->boundVariables[0]);
        $this->assertInstanceOf(ColorType::class, $class->color);
        $this->assertInstanceOf(VectorType::class, $class->offset);
        $this->assertTrue($class->visible);
        $this->assertEquals('10', $class->color->r);
        $this->assertEquals('20', $class->color->g);
        $this->assertEquals('30', $class->color->b);
        $this->assertEquals('40', $class->color->a);
        $this->assertEquals('DARKEN', $class->blendMode);
        $this->assertEquals('id', $class->boundVariables[0]->id);
        $this->assertEquals('type', $class->boundVariables[0]->type);
        $this->assertEquals('INNER_SHADOW', $class->type);
        $this->assertEquals('55', $class->radius);
        $this->assertTrue($class->showShadowBehindNode);
        $this->assertEquals('5', $class->offset->x);
        $this->assertEquals('4', $class->offset->y);
        $this->assertEquals('20', $class->spread);
    }
    public function testWithMinData(): void
    {
        $class = new EffectType([
            'type' => 'INNER_SHADOW',
            'radius' => 55
        ]);
        $this->assertEquals('INNER_SHADOW', $class->type);
        $this->assertEquals('55', $class->radius);
        $this->assertEquals('0', $class->spread);
        $this->assertTrue($class->visible);
        $this->assertNull($class->offset);
        $this->assertFalse($class->showShadowBehindNode);
        $this->assertNull($class->boundVariables);
        $this->assertNull($class->blendMode);
        $this->assertNull($class->color);
    }
    public function testInvalidType(): void
    {
        $class = new EffectType([
            'type' => 'type',
            'radius' => 55
        ]);
        $this->assertNull($class->type);
    }
    public function testInvalidRadius(): void
    {
        $class = new EffectType([
            'type' => 'INNER_SHADOW',
            'radius' => 'a'
        ]);
        $this->assertNull($class->radius);
    }
    public function testInvalidSpread(): void
    {
        $class = new EffectType([
            'type' => 'INNER_SHADOW',
            'spread' => [],
            'radius' => 55,
        ]);
        $this->assertEquals('0', $class->spread);
    }
    public function testInvalidShowShadowBehindNode(): void
    {
        $class = new EffectType([
            'type' => 'INNER_SHADOW',
            'radius' => 55,
            'showShadowBehindNode' => 'a'
        ]);
        $this->assertFalse($class->showShadowBehindNode);
    }
    public function testInvalidOffset(): void
    {
        $class = new EffectType([
            'type' => 'INNER_SHADOW',
            'radius' => 55,
            'offset' => 'a'
        ]);
        $this->assertNull($class->offset);
    }
}
