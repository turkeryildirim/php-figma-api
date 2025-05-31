<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
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
        $class = new EasingFunctionSpringType([
            'mass' => 'aa',
            'stiffness' => 20,
            'damping' => 30,
        ]);
        $this->assertNull($class->mass);
    }
    public function testInvalidStiffness(): void
    {
        $class = new EasingFunctionSpringType([
            'mass' => 10,
            'stiffness' => 'aa',
            'damping' => 30,
        ]);
        $this->assertNull($class->stiffness);
    }
    public function testInvalidDamping(): void
    {
        $class = new EasingFunctionSpringType([
            'mass' => 10,
            'stiffness' => 20,
            'damping' => 'aa',
        ]);
        $this->assertNull($class->damping);
    }
}
