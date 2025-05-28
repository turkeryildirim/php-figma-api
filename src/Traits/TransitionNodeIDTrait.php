<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait TransitionNodeIDTrait
{
    public readonly ?string $transitionNodeID;
    final protected function __transitionNodeID(array $data): void
    {
        $this->transitionNodeID = $data['transitionNodeID'] ?? null;
    }
}
