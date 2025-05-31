<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
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
        $this->assertEquals('READY_FOR_DEV', $class->type);
        $this->assertEquals('description', $class->description);
    }
    public function testWithMinData()
    {
        $class = new DevStatusType([
            'type' => 'READY_FOR_DEV'
        ]);
        $this->assertEquals('READY_FOR_DEV', $class->type);
        $this->assertNull($class->description);
    }
    public function testInvalidType()
    {
        $class = new DevStatusType(['type' => 'a']);
        $this->assertNull($class->type);
    }
}
