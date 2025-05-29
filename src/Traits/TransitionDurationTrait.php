<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Util\Helper;

trait TransitionDurationTrait
{
    public readonly int|float|null $transitionDuration;
    final protected function __transitionDuration(array $data): void
    {
        $this->transitionDuration = Helper::makeInteger($data['transitionDuration']);
    }
}
