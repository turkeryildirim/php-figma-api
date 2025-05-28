<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait PreserveRatioTrait
{
    public readonly ?bool $preserveRatio;
    final protected function __preserveRatio(array $data): void
    {
        $this->preserveRatio = $data['preserveRatio'] ?? null;
    }
}
