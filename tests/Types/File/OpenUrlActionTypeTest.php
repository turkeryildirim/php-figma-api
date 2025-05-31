<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\OpenUrlActionType;
use TypeError;

final class OpenUrlActionTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new OpenUrlActionType(['type' => 'type','url' => 'url']);
        $this->assertEquals('type', $class->type);
        $this->assertEquals('url', $class->url);
    }
    public function testInvalidUrl(): void
    {
        $this->expectException(TypeError::class);
        new OpenUrlActionType(['type' => 'type','url' => 5]);
    }
}
