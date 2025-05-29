<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum ConnectorLineTypeEnum: string
{
    use EnumArrayTrait;

    case ELBOWED  = 'ELBOWED';
    case STRAIGHT = 'STRAIGHT';
}
