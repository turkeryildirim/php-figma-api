<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum RotationEnum: string
{
    use EnumArrayTrait;

    case NONE = 'NONE';
    case CCW_90 = 'CCW_90';
}
