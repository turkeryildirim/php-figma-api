<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum OverflowDirectionEnum: string
{
    use EnumArrayTrait;

    case NONE = 'NONE';
    case HORIZONTAL_SCROLLING = 'HORIZONTAL_SCROLLING';
    case VERTICAL_SCROLLING = 'VERTICAL_SCROLLING';
    case HORIZONTAL_AND_VERTICAL_SCROLLING = 'HORIZONTAL_AND_VERTICAL_SCROLLING';
}
