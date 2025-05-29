<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Util\Helper;

trait StrokeWeightTrait
{
    public readonly int|float|null $strokeWeight;
    final protected function __strokeWeight(array $data): void
    {
        $this->strokeWeight = Helper::makeInteger($data['strokeWeight']);
    }
}
