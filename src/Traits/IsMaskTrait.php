<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Util\Helper;

trait IsMaskTrait
{
    public readonly ?bool $isMask;
    final protected function __isMask(array $data): void
    {
        $this->isMask = Helper::makeBoolean($data['isMask'], false);
    }
}
