<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum TextAlignVerticalEnum: string
{
    use EnumArrayTrait;

    case TOP    = 'TOP';
    case CENTER = 'CENTER';
    case BOTTOM = 'BOTTOM';
}
