<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum TextDecorationEnum: string
{
    use EnumArrayTrait;

    case NONE = 'NONE';
    case STRIKETHROUGH = 'STRIKETHROUGH';
    case UNDERLINE = 'UNDERLINE';
}
