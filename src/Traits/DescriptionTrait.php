<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait DescriptionTrait
{
    public readonly ?string $description;
    final protected function __description(array $data): void
    {
        $this->description = $data['description'] ?? null;
    }
}
