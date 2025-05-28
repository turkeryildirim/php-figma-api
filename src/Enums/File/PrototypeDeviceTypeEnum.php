<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum PrototypeDeviceTypeEnum: string
{
    use EnumArrayTrait;

    case NONE = 'NONE';
    case PRESET = 'PRESET';
    case CUSTOM = 'CUSTOM';
    case PRESENTATION = 'PRESENTATION';
}
