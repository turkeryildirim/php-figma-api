<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum LayoutConstraintHorizontalEnum: string
{
    use EnumArrayTrait;

    case LEFT       = 'LEFT';
    case RIGHT      = 'RIGHT';
    case CENTER     = 'CENTER';
    case LEFT_RIGHT = 'LEFT_RIGHT';
    case SCALE      = 'SCALE';
}
