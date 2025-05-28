<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Util\Helper;

trait RelativeTransformTrait
{
    public readonly ?array $relativeTransform;
    final protected function __relativeTransform(array $data): void
    {
        $this->relativeTransform = !empty($data['relativeTransform']) ?
            Helper::toArrayMatrix($data['relativeTransform']) : null;
    }
}
