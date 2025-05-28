<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait CreatedAtTrait
{
    public readonly string $createdAt;
    final protected function __createdAt(array $data): void
    {
        $this->createdAt = $data['created_at'];
    }
}
