<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\PathType;
use TypeError;

final class PathTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new PathType([
            'path' => 'path',
            'windingRule' => 'windingRule',
            'overrideID' => 20
        ]);
        $this->assertEquals('path', $class->path);
        $this->assertEquals('windingRule', $class->windingRule);
        $this->assertEquals('20', $class->overrideID);
    }
    public function testWithMinData(): void
    {
        $class = new PathType(['path' => 'path']);
        $this->assertEquals('path', $class->path);
        $this->assertNull($class->windingRule);
        $this->assertNull($class->overrideID);
    }
    public function testInvalidPath(): void
    {
        $this->expectException(TypeError::class);
        new PathType(['path' => 5]);
    }
    public function testInvalidWindingRule(): void
    {
        $this->expectException(TypeError::class);
        new PathType(['path' => 'path','windingRule' => 5]);
    }
    public function testInvalidOverrideID(): void
    {
        $this->expectException(TypeError::class);
        new PathType(['path' => 'path','overrideID' => 'overrideID']);
    }
}
