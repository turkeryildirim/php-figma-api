<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait NodeIdTrait
{
    public readonly ?string $nodeId;
    final protected function __nodeId(array $data): void
    {
        $this->nodeId = $data['node_id'] ?? $data['nodeId'] ?? null;
    }
}
