<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\DocumentNodeType;
use TypeError;

final class DocumentNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new DocumentNodeType([
            'id' => 'id',
            'name' => 'name',
            'type' => 'type',
            'scrollBehavior' => 'scrollBehavior',
        ]);
        $this->assertEquals('id', $class->id);
        $this->assertEquals('name', $class->name);
        $this->assertEquals('type', $class->type);
        $this->assertEquals('scrollBehavior', $class->scrollBehavior);
    }
    public function testWithMinData(): void
    {
        $class = new DocumentNodeType([
            'id' => 'id',
            'type' => 'type',
        ]);
        $this->assertEquals('id', $class->id);
        $this->assertEquals('type', $class->type);
        $this->assertNull($class->name);
        $this->assertNull($class->scrollBehavior);
    }
}
