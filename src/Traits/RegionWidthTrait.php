<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait RegionWidthTrait
{
    public readonly float|int $regionWidth;
    final protected function __regionWidth(array $data): void
    {
        $this->regionWidth = $data['region_width'] ?? 0;
    }
}
