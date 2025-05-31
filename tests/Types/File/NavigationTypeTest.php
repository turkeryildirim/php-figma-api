<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\NavigationType;
use TypeError;

final class NavigationTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new NavigationType(['type' => 'NAVIGATE']);
        $this->assertEquals('NAVIGATE', $class->type);
    }
    public function testInvalidType(): void
    {
        $class = new NavigationType(['type' => 'a']);
        $this->assertNull($class->type);
    }
}
