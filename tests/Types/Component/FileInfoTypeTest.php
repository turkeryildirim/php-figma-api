<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\Component;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Component\FrameInfoType;
use Turker\FigmaAPI\Types\File\ColorType;
use TypeError;

final class FileInfoTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $arrayVar = [
            'pageId' => 'pageId',
            'pageName' => 'pageName',
            'nodeId' => 'nodeId',
            'name' => 'name',
            'backgroundColor' => ['r' => 0,'g' => 0,'b' => 0,'a' => 0],
            'containing_component_set' => 'containingComponentSet'
        ];
        $class    = new FrameInfoType($arrayVar);

        $this->assertInstanceOf(FrameInfoType::class, $class);
        $this->assertEquals('name', $class->name);
        $this->assertEquals('pageId', $class->pageId);
        $this->assertEquals('pageName', $class->pageName);
        $this->assertEquals('nodeId', $class->nodeId);
        $this->assertEquals('containingComponentSet', $class->containingComponentSet);

        $this->assertInstanceOf(ColorType::class, $class->backgroundColor);
        $this->assertEquals('0', $class->backgroundColor->r);
        $this->assertEquals('0', $class->backgroundColor->g);
        $this->assertEquals('0', $class->backgroundColor->b);
        $this->assertEquals('0', $class->backgroundColor->a);
    }
    public function testWithMinData(): void
    {
        $class = new FrameInfoType(['nodeId' => 'nodeId']);
        $this->assertInstanceOf(FrameInfoType::class, $class);
        $this->assertEquals('nodeId', $class->nodeId);
        $this->assertNull($class->name);
        $this->assertNull($class->pageId);
        $this->assertNull($class->pageName);
        $this->assertNull($class->backgroundColor);
    }
    public function testInvalidPageId()
    {
        $this->expectException(TypeError::class);
        new FrameInfoType([
            'nodeId' => 'nodeId',
            'pageId' => 5
        ]);
    }
    public function testInvalidPageName()
    {
        $this->expectException(TypeError::class);
        new FrameInfoType([
            'nodeId' => 'nodeId',
            'pageName' => 5
        ]);
    }
    public function testInvalidContainingComponentSet()
    {
        $this->expectException(TypeError::class);
        new FrameInfoType([
            'nodeId' => 'nodeId',
            'containing_component_set' => 5
        ]);
    }
}
