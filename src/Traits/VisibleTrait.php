<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait VisibleTrait
{
    public readonly bool $visible;
    final protected function __visible(array $data): void
    {
        $this->visible = $data['visible'] ?? true;
    }
}
