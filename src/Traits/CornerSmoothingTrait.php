<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait CornerSmoothingTrait
{
    public readonly int|float $cornerSmoothing;
    final protected function __cornerSmoothing(array $data): void
    {
        $this->cornerSmoothing = $data['cornerSmoothing'] ?? 0;
    }
}
