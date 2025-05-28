<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\NavigationType;
use TypeError;

final class NavigationTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new NavigationType(['type' => 'NAVIGATE']);
        $this->assertEquals('NAVIGATE', $class->type->value);
    }
    public function testInvalidType(): void
    {
        $this->expectException(TypeError::class);
        new NavigationType(['type' => 'a']);
    }
}
