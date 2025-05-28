<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait XTrait
{
    public readonly float|int $x;
    final protected function __x(array $data): void
    {
        $this->x = $data['x'] ?? 0;
    }
}
