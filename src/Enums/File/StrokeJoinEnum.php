<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum StrokeJoinEnum: string
{
    use EnumArrayTrait;

    case MITER = 'MITER';
    case BEVEL = 'BEVEL';
    case ROUND = 'ROUND';
}
