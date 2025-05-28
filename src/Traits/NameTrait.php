<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait NameTrait
{
    public readonly ?string $name;
    final protected function __name(array $data): void
    {
        $this->name = $data['name'] ?? null;
    }
}
