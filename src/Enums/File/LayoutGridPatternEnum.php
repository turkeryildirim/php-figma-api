<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum LayoutGridPatternEnum: string
{
    use EnumArrayTrait;

    case COLUMNS = 'COLUMNS';
    case ROWS    = 'ROWS';
    case GRID    = 'GRID';
}
