<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\VariableAliasType;
use TypeError;

final class VariableAliasTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new VariableAliasType(['id' => 'id', 'type' => 'type']);
        $this->assertEquals('id', $class->id);
        $this->assertEquals('type', $class->type);
    }
}
