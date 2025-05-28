<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait DestinationIdTrait
{
    public readonly ?string $destinationId;
    final protected function __destinationId(array $data): void
    {
        $this->destinationId = $data['destinationId'] ?? null;
    }
}
