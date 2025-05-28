<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum EffectTypeEnum: string
{
    use EnumArrayTrait;

    case INNER_SHADOW = 'INNER_SHADOW';
    case DROP_SHADOW = 'DROP_SHADOW';
    case LAYER_BLUR = 'LAYER_BLUR';
    case BACKGROUND_BLUR = 'BACKGROUND_BLUR';
}
