<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait OpacityTrait
{
    public readonly int|float $opacity;
    final protected function __opacity(array $data): void
    {
        $this->opacity = $data['opacity'] ?? 1;
    }
}
