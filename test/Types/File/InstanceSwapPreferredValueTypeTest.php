<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\InstanceSwapPreferredValueType;
use ValueError;

final class InstanceSwapPreferredValueTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new InstanceSwapPreferredValueType([
            'key' => 'key',
            'type' => 'COMPONENT_SET'
        ]);
        $this->assertEquals('key', $class->key);
        $this->assertEquals('COMPONENT_SET', $class->type->value);
    }
    public function testInvalidType(): void
    {
        $this->expectException(ValueError::class);
        new InstanceSwapPreferredValueType([
            'type' => 'a',
            'key' => 'key'
        ]);
    }
}
