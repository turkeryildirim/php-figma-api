<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum OperationTypeEnum: string
{
    use EnumArrayTrait;

    case UNION     = 'UNION';
    case INTERSECT = 'INTERSECT';
    case SUBTRACT  = 'SUBTRACT';
    case EXCLUDE   = 'EXCLUDE';
}
