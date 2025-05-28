<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait RegionHeightTrait
{
    public readonly float|int $regionHeight;
    final protected function __regionHeight(array $data): void
    {
        $this->regionHeight = $data['region_height'] ?? 0;
    }
}
