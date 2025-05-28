<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum LayoutModeEnum: string
{
    use EnumArrayTrait;

    case NONE = 'NONE';
    case HORIZONTAL = 'HORIZONTAL';
    case VERTICAL = 'VERTICAL';
}
