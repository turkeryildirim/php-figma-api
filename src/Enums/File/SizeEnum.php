<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum SizeEnum: string
{
    use EnumArrayTrait;

    case WIDTH = 'WIDTH';
    case HEIGHT = 'HEIGHT';
}
