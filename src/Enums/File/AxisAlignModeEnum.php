<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum AxisAlignModeEnum: string
{
    use EnumArrayTrait;

    case AUTO = 'AUTO';
    case MIN = 'MIN';
    case CENTER = 'CENTER';
    case MAX = 'MAX';
    case SPACE_BETWEEN = 'SPACE_BETWEEN';
    case BASELINE = 'BASELINE';
}
