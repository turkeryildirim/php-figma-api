<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum TriggerTypeEnum: string
{
    use EnumArrayTrait;

    case ON_CLICK = 'ON_CLICK';
    case ON_HOVER = 'ON_HOVER';
    case ON_PRESS = 'ON_PRESS';
    case ON_DRAG = 'ON_DRAG';
    case AFTER_TIMEOUT = 'AFTER_TIMEOUT';
    case MOUSE_ENTER = 'MOUSE_ENTER';
    case MOUSE_LEAVE = 'MOUSE_LEAVE';
    case MOUSE_UP = 'MOUSE_UP';
    case MOUSE_DOWN = 'MOUSE_DOWN';
    case ON_MEDIA_END = 'ON_MEDIA_END';
    case ON_KEY_DOWN = 'ON_KEY_DOWN';
    case ON_KEY_UP = 'ON_KEY_UP';
    case ON_MEDIA_HIT = 'ON_MEDIA_HIT';
}
