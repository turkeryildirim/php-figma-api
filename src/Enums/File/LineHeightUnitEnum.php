<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum LineHeightUnitEnum: string
{
    use EnumArrayTrait;

    case PIXELS    = 'PIXELS';
    case FONT_SIZE = 'FONT_SIZE_%';
    case INTRINSIC = 'INTRINSIC_%';
}
