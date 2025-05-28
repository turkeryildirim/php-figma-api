<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\BackActionType;

final class BackActionTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new BackActionType(['type' => 'type']);
        $this->assertEquals('type', $class->type);
    }
}
