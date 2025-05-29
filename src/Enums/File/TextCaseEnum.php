<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum TextCaseEnum: string
{
    use EnumArrayTrait;

    case ORIGINAL          = 'ORIGINAL';
    case UPPER             = 'UPPER';
    case LOWER             = 'LOWER';
    case TITLE             = 'TITLE';
    case SMALL_CAPS        = 'SMALL_CAPS';
    case SMALL_CAPS_FORCED = 'SMALL_CAPS_FORCED';
}
