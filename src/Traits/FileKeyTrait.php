<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait FileKeyTrait
{
    public readonly ?string $filekey;
    final protected function __filekey(array $data): void
    {
        $this->filekey = $data['file_key'] ?? $data['filekey'] ?? null;
    }
}
