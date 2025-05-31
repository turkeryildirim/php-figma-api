<?php

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\ComponentTypeEnum;
use Turker\FigmaAPI\Traits\KeyTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class InstanceSwapPreferredValueType extends AbstractType
{
    use KeyTrait;

    public readonly ?string $type;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->type = Helper::makeFromEnum($data['type'], ComponentTypeEnum::class);
    }
}
