<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait LastModifiedTrait
{
    public readonly ?string $lastModified;
    final protected function __lastModified(array $data): void
    {
        $this->lastModified = $data['last_modified'] ?? $data['lastModified'] ?? null;
    }
}
