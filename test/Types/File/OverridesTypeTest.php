<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\OverridesType;
use TypeError;

final class OverridesTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new OverridesType(['id' => 'id','overriddenFields' => ['overriddenFields']]);
        $this->assertEquals('id', $class->id);
        $this->assertEquals('overriddenFields', $class->overriddenFields[0]);
    }
    public function testWithMinData(): void
    {
        $class = new OverridesType(['id' => 'id']);
        $this->assertEquals('id', $class->id);
        $this->assertNull($class->overriddenFields);
    }
    public function testInvalidOverriddenFields(): void
    {
        $this->expectException(TypeError::class);
        new OverridesType(['id' => 'id','overriddenFields' => 5]);
    }
}
