<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\EasingType;

trait EasingTrait
{
    public readonly ?EasingType $easing;
    final protected function __easing(array $data): void
    {
        $this->easing = !empty($data['easing']) ? new EasingType($data['easing']) : null;
    }
}
