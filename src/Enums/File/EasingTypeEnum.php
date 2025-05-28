<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum EasingTypeEnum: string
{
    use EnumArrayTrait;

    case EASE_IN = 'EASE_IN';
    case EASE_OUT = 'EASE_OUT';
    case EASE_IN_AND_OUT = 'EASE_IN_AND_OUT';
    case LINEAR = 'LINEAR';
    case GENTLE_SPRING = 'GENTLE_SPRING';
}
