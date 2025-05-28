<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\DevStatusTypeEnum;
use Turker\FigmaAPI\Traits\DescriptionTrait;
use Turker\FigmaAPI\Types\AbstractType;

class DevStatusType extends AbstractType
{
    use DescriptionTrait;

    public readonly DevStatusTypeEnum $type;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->type = DevStatusTypeEnum::from($data['type']);
    }
}
