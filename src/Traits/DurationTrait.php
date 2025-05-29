<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Util\Helper;

trait DurationTrait
{
    public readonly int|float|null $duration;
    final protected function __duration(array $data): void
    {
        $this->duration = Helper::makeInteger($data['duration']);
    }
}
