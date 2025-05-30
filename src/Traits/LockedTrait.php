<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Util\Helper;

trait LockedTrait
{
    public readonly ?bool $locked;
    final protected function __locked(array $data): void
    {
        $this->locked = Helper::makeBoolean($data['locked'], false);
    }
}
