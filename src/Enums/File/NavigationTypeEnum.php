<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum NavigationTypeEnum: string
{
    use EnumArrayTrait;

    case NAVIGATE  = 'NAVIGATE';
    case SWAP      = 'SWAP';
    case OVERLAY   = 'OVERLAY';
    case SCROLL_TO = 'SCROLL_TO';
    case CHANGE_TO = 'CHANGE_TO';
}
