<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait LockedTrait
{
    public readonly bool $locked;
    final protected function __locked(array $data): void
    {
        $this->locked = $data['locked'] ?? false;
    }
}
