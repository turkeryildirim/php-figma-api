<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Util\Helper;

trait CornerSmoothingTrait
{
    public readonly int|float $cornerSmoothing;
    final protected function __cornerSmoothing(array $data): void
    {
        $this->cornerSmoothing = Helper::makeInteger($data['cornerSmoothing'], 0);
    }
}
