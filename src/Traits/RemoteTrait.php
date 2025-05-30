<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Util\Helper;

trait RemoteTrait
{
    public readonly ?bool $remote;
    final protected function __remote(array $data): void
    {
        $this->remote = Helper::makeBoolean($data['remote'], false);
    }
}
