<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\EasingType;

trait TransitionEasingTrait
{
    public readonly ?EasingType $transitionEasing;
    final protected function __transitionEasing(array $data): void
    {
        $this->transitionEasing = !empty($data['transitionEasing']) ?
            new EasingType($data['transitionEasing']) : null;
    }
}
