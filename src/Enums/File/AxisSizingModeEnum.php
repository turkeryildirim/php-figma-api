<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum AxisSizingModeEnum: string
{
    use EnumArrayTrait;

    case FIXED = 'FIXED';
    case AUTO  = 'AUTO';
}
