<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait YTrait
{
    public readonly float|int $y;
    final protected function __y(array $data): void
    {
        $this->y = $data['y'] ?? 0;
    }
}
