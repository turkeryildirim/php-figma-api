<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum DevStatusTypeEnum: string
{
    use EnumArrayTrait;

    case READY_FOR_DEV = 'READY_FOR_DEV';
    case COMPLETED = 'COMPLETED';
}
