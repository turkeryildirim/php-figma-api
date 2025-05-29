<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum DirectionEnum: string
{
    use EnumArrayTrait;

    case TOP    = 'TOP';
    case RIGHT  = 'RIGHT';
    case BOTTOM = 'BOTTOM';
    case LEFT   = 'LEFT';
}
