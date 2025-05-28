<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum PositionEnum: string
{
    use EnumArrayTrait;

    case AUTO = 'AUTO';
    case ABSOLUTE = 'ABSOLUTE';
    case RELATIVE = 'RELATIVE';
    case FIXED = 'FIXED';
}
