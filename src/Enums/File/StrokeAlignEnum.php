<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum StrokeAlignEnum: string
{
    use EnumArrayTrait;

    case INSIDE = 'INSIDE';
    case OUTSIDE = 'OUTSIDE';
    case CENTER = 'CENTER';
}
