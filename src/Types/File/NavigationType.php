<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\NavigationTypeEnum;
use Turker\FigmaAPI\Types\AbstractType;

class NavigationType extends AbstractType
{
    public readonly NavigationTypeEnum $type;

    public function __construct(array $data)
    {
        $this->type = NavigationTypeEnum::tryFrom($data['type']);
    }
}
