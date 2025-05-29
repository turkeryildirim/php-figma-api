<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum TextAutoResizeEnum: string
{
    use EnumArrayTrait;

    case NONE             = 'NONE';
    case HEIGHT           = 'HEIGHT';
    case WIDTH_AND_HEIGHT = 'WIDTH_AND_HEIGHT';
    case TRUNCATE         = 'TRUNCATE';
}
