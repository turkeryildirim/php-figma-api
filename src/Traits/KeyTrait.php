<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait KeyTrait
{
    public readonly string $key;
    final protected function __key(array $data): void
    {
        $this->key = $data['key'];
    }
}
