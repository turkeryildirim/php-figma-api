<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\Common;

use Turker\FigmaAPI\Types\AbstractType;

class CursorType extends AbstractType
{
    public readonly string|int|float|null $after;
    public readonly string|int|float|null $before;

    public function __construct(array $data)
    {
        $this->before = $data['before'] ?? null;
        $this->after  = $data['after'] ?? null;
    }
}
