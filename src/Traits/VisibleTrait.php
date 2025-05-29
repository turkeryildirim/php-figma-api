<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Util\Helper;

trait VisibleTrait
{
    public readonly bool $visible;
    final protected function __visible(array $data): void
    {
        $this->visible = Helper::makeBoolean($data['visible'], true);
    }
}
