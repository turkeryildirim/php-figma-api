<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait ThumbnailUrlTrait
{
    public readonly ?string $thumbnailUrl;
    final protected function __thumbnailUrl(array $data): void
    {
        $this->thumbnailUrl = $data['thumbnail_url'] ?? $data['thumbnailUrl'] ?? null;
    }
}
