<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\Style;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum StyleTypeEnum: string
{
    use EnumArrayTrait;

    case FILL = 'FILL';
    case TEXT = 'TEXT';
    case GRID = 'GRID';
    case EFFECT = 'EFFECT';
}
