<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\StyleType;
use TypeError;

final class StyleTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new StyleType([
            'key' => 'key',
            'name' => 'name',
            'description' => 'description',
            'remote' => true,
            'style_type' => 'FILL',
        ]);
        $this->assertEquals('key', $class->key);
        $this->assertEquals('name', $class->name);
        $this->assertEquals('description', $class->description);
        $this->assertTrue($class->remote);
        $this->assertEquals('FILL', $class->styleType);
    }
    public function testWithMinData(): void
    {
        $class = new StyleType(['key' => 'key']);
        $this->assertEquals('key', $class->key);
        $this->assertNull($class->name);
        $this->assertNull($class->description);
        $this->assertNull($class->styleType);
        $this->assertFalse($class->remote);
    }
}
