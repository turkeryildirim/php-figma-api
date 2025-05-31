<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\PrototypeDeviceType;

final class PrototypeDeviceTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new PrototypeDeviceType([
            'presetIdentifier' => 'presetIdentifier',
            'type' => 'PRESET',
            'rotation' => 'CCW_90',
            'size' => 'HEIGHT',
        ]);
        $this->assertEquals('presetIdentifier', $class->presetIdentifier);
        $this->assertEquals('PRESET', $class->type);
        $this->assertEquals('CCW_90', $class->rotation);
        $this->assertEquals('HEIGHT', $class->size);
    }
    public function testWithMinData(): void
    {
        $class = new PrototypeDeviceType([]);
        $this->assertNull($class->presetIdentifier);
        $this->assertEquals('NONE', $class->type);
        $this->assertNull($class->rotation);
        $this->assertNull($class->size);
    }
    public function testInvalidType(): void
    {
        $class = new PrototypeDeviceType(['type' => 'type']);
        $this->assertEquals('NONE', $class->type);
    }
    public function testInvalidRotation(): void
    {
        $class = new PrototypeDeviceType(['rotation' => 'a' ]);
        $this->assertNull($class->rotation);
    }
    public function testInvalidSize(): void
    {
        $class = new PrototypeDeviceType(['size' => 'a' ]);
        $this->assertNull($class->size);
    }
}
