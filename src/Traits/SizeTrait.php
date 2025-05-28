<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\Common\VectorType;

trait SizeTrait
{
    public readonly ?VectorType $size;
    final protected function __size(array $data): void
    {
        $this->size = !empty($data['size']) ?
            new VectorType($data['size']) : null;
    }
}
