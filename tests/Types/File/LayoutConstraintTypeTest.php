<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\LayoutConstraintType;

final class LayoutConstraintTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new LayoutConstraintType([
            'vertical' => 'BOTTOM',
            'horizontal' => 'CENTER'
        ]);
        $this->assertEquals('BOTTOM', $class->vertical);
        $this->assertEquals('CENTER', $class->horizontal);
    }
    public function testOnlyVerticalData(): void
    {
        $class = new LayoutConstraintType([
            'vertical' => 'BOTTOM'
        ]);
        $this->assertEquals('BOTTOM', $class->vertical);
        $this->assertNull($class->horizontal);
    }
    public function testOnlyHorizontalData(): void
    {
        $class = new LayoutConstraintType([
            'horizontal' => 'CENTER'
        ]);
        $this->assertEquals('CENTER', $class->horizontal);
        $this->assertNull($class->vertical);
    }
    public function testInvalidVertical(): void
    {
        $class = new LayoutConstraintType([
            'vertical' => 'A'
        ]);
        $this->assertNull($class->vertical);
    }
    public function testInvalidHorizontal(): void
    {
        $class = new LayoutConstraintType([
            'horizontal' => 'A'
        ]);
        $this->assertNull($class->horizontal);
    }
}
