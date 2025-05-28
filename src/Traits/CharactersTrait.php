<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait CharactersTrait
{
    public readonly string $characters;
    final protected function __characters(array $data): void
    {
        $this->characters = $data['characters'];
    }
}
