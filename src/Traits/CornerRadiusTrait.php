<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait CornerRadiusTrait
{
    public readonly int|float|null $cornerRadius;
    final protected function __cornerRadius(array $data): void
    {
        $this->cornerRadius = $data['cornerRadius'] ?? null;
    }
}
