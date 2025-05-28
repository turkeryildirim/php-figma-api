<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum DirectionalTransitionTypeEnum: string
{
    use EnumArrayTrait;

    case MOVE_IN = 'MOVE_IN';
    case MOVE_OUT = 'MOVE_OUT';
    case PUSH = 'PUSH';
    case SLIDE_IN = 'SLIDE_IN';
    case SLIDE_OUT = 'SLIDE_OUT';
}
