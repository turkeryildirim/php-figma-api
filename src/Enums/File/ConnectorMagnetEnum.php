<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum ConnectorMagnetEnum: string
{
    use EnumArrayTrait;

    case AUTO   = 'AUTO';
    case TOP    = 'TOP';
    case BOTTOM = 'BOTTOM';
    case LEFT   = 'LEFT';
    case RIGHT  = 'RIGHT';
}
