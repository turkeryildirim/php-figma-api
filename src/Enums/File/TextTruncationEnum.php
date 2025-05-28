<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum TextTruncationEnum: string
{
    use EnumArrayTrait;

    case DISABLED = 'DISABLED';
    case ENDING = 'ENDING';
}
