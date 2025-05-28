<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\TriggerType;
use TypeError;

final class TriggerTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new TriggerType([
            'type' => 'ON_HOVER',
            'timeout' => 10,
            'delay' => 10,
            'mediaHitTime' => 10,
            'deprecatedVersion' => true,
            'device' => 'XBOX_ONE',
            'keyCodes' => [1,2],
        ]);
        $this->assertEquals('ON_HOVER', $class->type->value);
        $this->assertEquals('10', $class->timeout);
        $this->assertEquals('10', $class->delay);
        $this->assertEquals('10', $class->mediaHitTime);
        $this->assertEquals('XBOX_ONE', $class->device->value);
        $this->assertEquals('1', $class->keyCodes[0]);
        $this->assertTrue($class->deprecatedVersion);
    }
    public function testWithMinData(): void
    {
        $class = new TriggerType(['type' => 'ON_HOVER']);
        $this->assertEquals('ON_HOVER', $class->type->value);
        $this->assertNull($class->timeout);
        $this->assertNull($class->delay);
        $this->assertNull($class->mediaHitTime);
        $this->assertNull($class->device);
        $this->assertNull($class->keyCodes);
        $this->assertFalse($class->deprecatedVersion);
    }
    public function testInvalidType(): void
    {
        $this->expectException(TypeError::class);
        new TriggerType(['type' => 'type']);
    }
    public function testInvalidTimeout(): void
    {
        $this->expectException(TypeError::class);
        new TriggerType(['type' => 'ON_HOVER', 'timeout' => 'timeout']);
    }
    public function testInvalidDelay(): void
    {
        $this->expectException(TypeError::class);
        new TriggerType(['type' => 'ON_HOVER', 'delay' => 'delay']);
    }
    public function testInvalidMediaHitTime(): void
    {
        $this->expectException(TypeError::class);
        new TriggerType(['type' => 'ON_HOVER', 'mediaHitTime' => 'mediaHitTime']);
    }
    public function testInvalidDevice(): void
    {
        $class = new TriggerType(['type' => 'ON_HOVER', 'device' => 'device']);
        $this->assertNull($class->device);
    }
    public function testInvalidKeyCodes(): void
    {
        $this->expectException(TypeError::class);
        new TriggerType(['type' => 'ON_HOVER', 'keyCodes' => 'keyCodes']);
    }
    public function testInvalidDeprecatedVersion(): void
    {
        $this->expectException(TypeError::class);
        new TriggerType(['type' => 'ON_HOVER', 'deprecatedVersion' => 'deprecatedVersion']);
    }
}
