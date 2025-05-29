<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Util\Helper;

trait CornerRadiusTrait
{
    public readonly int|float|null $cornerRadius;
    final protected function __cornerRadius(array $data): void
    {
        $this->cornerRadius = Helper::makeInteger($data['cornerRadius']);
    }
}
