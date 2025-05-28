<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum HyperlinkTypeEnum: string
{
    use EnumArrayTrait;

    case URL = 'URL';
    case NODE = 'NODE';
}
