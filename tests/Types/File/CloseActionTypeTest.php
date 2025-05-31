<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\CloseActionType;

final class CloseActionTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new CloseActionType(['type' => 'type']);
        $this->assertEquals('type', $class->type);
    }
}
