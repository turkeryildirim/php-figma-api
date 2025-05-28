<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum LayoutWrapEnum: string
{
    use EnumArrayTrait;

    case NO_WRAP = 'NO_WRAP';
    case WRAP = 'WRAP';
}
