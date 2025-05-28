<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum MediaActionTypeEnum: string
{
    use EnumArrayTrait;

    case PLAY = 'PLAY';
    case PAUSE = 'PAUSE';
    case TOGGLE_PLAY_PAUSE = 'TOGGLE_PLAY_PAUSE';
    case MUTE = 'MUTE';
    case UNMUTE = 'UNMUTE';
    case TOGGLE_MUTE_UNMUTE = 'TOGGLE_MUTE_UNMUTE';
    case SKIP_FORWARD = 'SKIP_FORWARD';
    case SKIP_BACKWARD = 'SKIP_BACKWARD';
    case SKIP_TO = 'SKIP_TO';
}
