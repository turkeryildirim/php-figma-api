<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum MaskTypeEnum: string
{
    use EnumArrayTrait;

    case ALPHA     = 'ALPHA';
    case VECTOR    = 'VECTOR';
    case LUMINANCE = 'LUMINANCE';
}
