<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait UpdatedAtTrait
{
    public readonly ?string $updatedAt;
    final protected function __updatedAt(array $data): void
    {
        $this->updatedAt = $data['updated_at'] ?? null;
    }
}
