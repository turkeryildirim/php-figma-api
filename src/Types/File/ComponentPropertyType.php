<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\ComponentPropertyTypeEnum;
use Turker\FigmaAPI\Traits\BoundVariablesTrait;
use Turker\FigmaAPI\Traits\PreferredValuesTrait;
use Turker\FigmaAPI\Types\AbstractType;

class ComponentPropertyType extends AbstractType
{
    use PreferredValuesTrait;
    use BoundVariablesTrait;

    public readonly ComponentPropertyTypeEnum $type;
    public readonly string $value;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->type  = ComponentPropertyTypeEnum::from($data['type']);
        $this->value = $data['value'];
    }
}
