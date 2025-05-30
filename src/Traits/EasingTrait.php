<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\EasingType;
use Turker\FigmaAPI\Util\Helper;

trait EasingTrait
{
    public readonly ?EasingType $easing;
    final protected function __easing(array $data): void
    {
        $this->easing = Helper::makeObject($data['easing'], EasingType::class);
    }
}
