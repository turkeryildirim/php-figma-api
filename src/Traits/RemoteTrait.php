<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait RemoteTrait
{
    public readonly bool $remote;
    final protected function __remote(array $data): void
    {
        $this->remote = $data['remote'] ?? false;
    }
}
