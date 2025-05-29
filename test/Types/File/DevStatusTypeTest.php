<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\DevStatusType;
use ValueError;

final class DevStatusTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new DevStatusType([
            'type' => 'READY_FOR_DEV',
            'description' => 'description'
        ]);
        $this->assertEquals('READY_FOR_DEV', $class->type->value);
        $this->assertEquals('description', $class->description);
    }
    public function testWithMinData()
    {
        $class = new DevStatusType([
            'type' => 'READY_FOR_DEV'
        ]);
        $this->assertEquals('READY_FOR_DEV', $class->type->value);
        $this->assertNull($class->description);
    }
    public function testInvalidType()
    {
        $this->expectException(ValueError::class);
        new DevStatusType(['type' => 'a']);
    }
}
