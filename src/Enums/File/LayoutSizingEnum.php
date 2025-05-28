<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum LayoutSizingEnum: string
{
    use EnumArrayTrait;

    case FIXED = 'FIXED';
    case HUG = 'HUG';
    case FILL = 'FILL';
}
