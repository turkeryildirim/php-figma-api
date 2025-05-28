<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\EasingFunctionSpringType;
use TypeError;

final class EasingFunctionSpringTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new EasingFunctionSpringType([
            'mass' => 10,
            'stiffness' => 20,
            'damping' => 30,
        ]);
        $this->assertEquals('10', $class->mass);
        $this->assertEquals('20', $class->stiffness);
        $this->assertEquals('30', $class->damping);
    }
    public function testInvalidMass(): void
    {
        $this->expectException(TypeError::class);
        new EasingFunctionSpringType([
            'mass' => '10',
            'stiffness' => 20,
            'damping' => 30,
        ]);
    }
    public function testInvalidStiffness(): void
    {
        $this->expectException(TypeError::class);
        new EasingFunctionSpringType([
            'mass' => 10,
            'stiffness' => '20',
            'damping' => 30,
        ]);
    }
    public function testInvalidDamping(): void
    {
        $this->expectException(TypeError::class);
        new EasingFunctionSpringType([
            'mass' => 10,
            'stiffness' => 20,
            'damping' => '30',
        ]);
    }
}
