<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\Project;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Project\ProjectType;

final class ProjectTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new ProjectType(['id' => 'id','name' => 'name']);
        $this->assertEquals('id', $class->id);
        $this->assertEquals('name', $class->name);
    }
    public function testWithMinData(): void
    {
        $class = new ProjectType([ 'id' => 'id']);
        $this->assertEquals('id', $class->id);
        $this->assertNull($class->name);
    }
}
