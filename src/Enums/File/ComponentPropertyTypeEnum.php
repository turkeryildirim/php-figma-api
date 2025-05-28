<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum ComponentPropertyTypeEnum: string
{
    use EnumArrayTrait;

    case BOOLEAN = 'BOOLEAN';
    case INSTANCE_SWAP = 'INSTANCE_SWAP';
    case TEXT = 'TEXT';
    case VARIANT = 'VARIANT';
}
