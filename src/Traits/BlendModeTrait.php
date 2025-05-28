<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\File\BlendModeEnum;

trait BlendModeTrait
{
    public readonly ?BlendModeEnum $blendMode;
    final protected function __blendMode(array $data): void
    {
        $this->blendMode = ( !empty($data['blendMode']) && BlendModeEnum::hasValue($data['blendMode']) )
            ? BlendModeEnum::tryFrom($data['blendMode']) : null;
    }
}
