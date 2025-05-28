<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait ScrollBehaviorTrait
{
    public readonly ?string $scrollBehavior;
    final protected function __scrollBehavior(array $data): void
    {
        $this->scrollBehavior = $data['scrollBehavior'] ?? null;
    }
}
