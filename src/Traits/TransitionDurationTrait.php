<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait TransitionDurationTrait
{
    public readonly int|float|null $transitionDuration;
    final protected function __transitionDuration(array $data): void
    {
        $this->transitionDuration = $data['transitionDuration'] ?? null;
    }
}
