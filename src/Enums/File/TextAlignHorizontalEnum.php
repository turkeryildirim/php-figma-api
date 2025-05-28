<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum TextAlignHorizontalEnum: string
{
    use EnumArrayTrait;

    case LEFT = 'LEFT';
    case RIGHT = 'RIGHT';
    case CENTER = 'CENTER';
    case JUSTIFIED = 'JUSTIFIED';
}
