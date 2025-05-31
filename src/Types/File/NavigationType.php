<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\NavigationTypeEnum;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class NavigationType extends AbstractType
{
    public readonly ?string $type;

    public function __construct(array $data)
    {
        $this->type = Helper::makeFromEnum($data['type'], NavigationTypeEnum::class);
    }
}
