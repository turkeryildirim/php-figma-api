<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait StrokeDashesTrait
{
    /**
     * @var int[]|float[]|null
     */
    public readonly ?array $strokeDashes;
    final protected function __strokeDashes(array $data): void
    {
        $this->strokeDashes = $data['strokeDashes'] ?? null;
    }
}
