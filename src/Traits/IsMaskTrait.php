<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait IsMaskTrait
{
    public readonly bool $isMask;
    final protected function __isMask(array $data): void
    {
        $this->isMask = $data['isMask'] ?? false;
    }
}
