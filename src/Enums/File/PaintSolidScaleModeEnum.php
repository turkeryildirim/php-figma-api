<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum PaintSolidScaleModeEnum: string
{
    use EnumArrayTrait;

    case FILL    = 'FILL';
    case FIT     = 'FIT';
    case TILE    = 'TILE';
    case STRETCH = 'STRETCH';
}
