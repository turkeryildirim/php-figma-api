<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait TypeTrait
{
    public readonly string $type;
    final protected function __type(array $data): void
    {
        $this->type = $data['type'];
    }
}
