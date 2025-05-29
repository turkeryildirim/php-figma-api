<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Util\Helper;

trait PreserveRatioTrait
{
    public readonly ?bool $preserveRatio;
    final protected function __preserveRatio(array $data): void
    {
        $this->preserveRatio = Helper::makeBoolean($data['preserveRatio']);
    }
}
