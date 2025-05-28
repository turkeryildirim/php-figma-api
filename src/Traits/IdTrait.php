<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait IdTrait
{
    public readonly string $id;
    final protected function __id(array $data): void
    {
        $this->id = $data['id'];
    }
}
