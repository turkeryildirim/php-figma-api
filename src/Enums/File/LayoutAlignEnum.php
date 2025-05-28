<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum LayoutAlignEnum: string
{
    use EnumArrayTrait;

    case INHERIT = 'INHERIT';
    case STRETCH = 'STRETCH';
    case MIN = 'MIN';
    case CENTER = 'CENTER';
    case MAX = 'MAX';
}
