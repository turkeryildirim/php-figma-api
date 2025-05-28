<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum SemanticWeightEnum: string
{
    use EnumArrayTrait;

    case BOLD = 'BOLD';
    case NORMAL = 'NORMAL';
}
