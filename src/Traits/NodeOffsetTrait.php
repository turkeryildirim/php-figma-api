<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\Common\VectorType;

trait NodeOffsetTrait
{
    public readonly ?VectorType $nodeOffset;
    final protected function __nodeOffset(array $data): void
    {
        $this->nodeOffset = !empty($data['node_offset']) ? new VectorType($data['node_offset']) : null;
    }
}
