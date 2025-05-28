<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait DurationTrait
{
    public readonly int|float|null $duration;
    final protected function __duration(array $data): void
    {
        $this->duration = $data['duration'] ?? null;
    }
}
