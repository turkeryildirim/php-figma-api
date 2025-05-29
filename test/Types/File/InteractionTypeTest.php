<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\InteractionType;
use TypeError;

final class InteractionTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new InteractionType([
            'trigger' => [
                'type' => 'ON_HOVER',
                'timeout' => 10,
                'delay' => 10,
                'mediaHitTime' => 10,
                'deprecatedVersion' => true,
                'device' => 'XBOX_ONE',
                'keyCodes' => [1,2],
            ],
            'actions' => [[
                'type' => 'URL',
                'url' => 'url'
            ]]
        ]);
        $this->assertEquals('ON_HOVER', $class->trigger->type->value);
        $this->assertEquals('10', $class->trigger->timeout);
        $this->assertEquals('10', $class->trigger->delay);
        $this->assertEquals('10', $class->trigger->mediaHitTime);
        $this->assertEquals('XBOX_ONE', $class->trigger->device->value);
        $this->assertEquals('1', $class->trigger->keyCodes[0]);
        $this->assertTrue($class->trigger->deprecatedVersion);
        $this->assertEquals('URL', $class->actions[0]->type);
        $this->assertEquals('url', $class->actions[0]->url);
    }
    public function testWithMinData(): void
    {
        $class = new InteractionType(['trigger' => ['type' => 'ON_HOVER']]);
        $this->assertEquals('ON_HOVER', $class->trigger->type->value);
        $this->assertNull($class->trigger->timeout);
        $this->assertNull($class->trigger->delay);
        $this->assertNull($class->trigger->mediaHitTime);
        $this->assertNull($class->trigger->device);
        $this->assertNull($class->trigger->keyCodes);
        $this->assertFalse($class->trigger->deprecatedVersion);
        $this->assertNull($class->actions);
    }
    public function testInvalidTrigger()
    {
        $this->expectException(TypeError::class);
        new InteractionType([
            'trigger' => [
                'a' => 'b'
            ]
        ]);
    }
    public function testInvalidDevice()
    {
        $class = new InteractionType([
            'trigger' => [
                'type' => 'ON_HOVER',
                'device' => 'device',
            ]
        ]);
        $this->assertNull($class->trigger->device);
    }
    public function testInvalidKeyCodes()
    {
        $this->expectException(TypeError::class);
        new InteractionType([
            'trigger' => [
                'type' => 'ON_HOVER',
                'keyCodes' => 'keyCodes',
            ]
        ]);
    }
    public function testInvalidActions()
    {
        $this->expectException(TypeError::class);
        new InteractionType([
            'trigger' => [
                'type' => 'ON_HOVER',
            ],
            'actions' => ['a']
        ]);
    }
}
