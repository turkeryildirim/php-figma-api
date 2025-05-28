<?php

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\ComponentTypeEnum;
use Turker\FigmaAPI\Traits\KeyTrait;
use Turker\FigmaAPI\Types\AbstractType;

class InstanceSwapPreferredValueType extends AbstractType
{
    use KeyTrait;

    public readonly ComponentTypeEnum $type;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->type = ComponentTypeEnum::from($data['type']);
    }
}
