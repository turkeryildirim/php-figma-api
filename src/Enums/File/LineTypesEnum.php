<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum LineTypesEnum: string
{
    use EnumArrayTrait;

    case ORDERED   = "ORDERED";
    case UNORDERED = "UNORDERED";
    case NONE      = "NONE";
}
