<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum LayoutConstraintVerticalEnum: string
{
    use EnumArrayTrait;

    case TOP        = 'TOP';
    case BOTTOM     = 'BOTTOM';
    case CENTER     = 'CENTER';
    case TOP_BOTTOM = 'TOP_BOTTOM';
    case SCALE      = 'SCALE';
}
