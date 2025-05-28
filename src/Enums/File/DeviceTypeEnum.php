<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum DeviceTypeEnum: string
{
    use EnumArrayTrait;

    case KEYBOARD = 'KEYBOARD';
    case XBOX_ONE = 'XBOX_ONE';
    case PS4 = 'PS4';
    case SWITCH_PRO = 'SWITCH_PRO';
    case UNKNOWN_CONTROLLER = 'UNKNOWN_CONTROLLER';
}
