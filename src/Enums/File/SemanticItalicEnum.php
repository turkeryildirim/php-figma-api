<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum SemanticItalicEnum: string
{
    use EnumArrayTrait;

    case ITALIC = 'ITALIC';
    case NORMAL = 'NORMAL';
}
