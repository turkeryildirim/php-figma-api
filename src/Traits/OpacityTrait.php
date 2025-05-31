<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Util\Helper;

trait OpacityTrait
{
    public readonly int|float|null $opacity;
    final protected function __opacity(array $data): void
    {
        $this->opacity = Helper::makeInteger($data['opacity'], 1);
    }
}
