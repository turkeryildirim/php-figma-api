<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum LayoutGridAlignmentEnum: string
{
    use EnumArrayTrait;

    case MIN     = 'MIN';
    case MAX     = 'MAX';
    case CENTER  = 'CENTER';
    case STRETCH = 'STRETCH';
}
