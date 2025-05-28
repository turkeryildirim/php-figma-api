<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\ComponentPropertyTypeEnum;
use Turker\FigmaAPI\Traits\PreferredValuesTrait;
use Turker\FigmaAPI\Types\AbstractType;

class ComponentPropertyDefinitionType extends AbstractType
{
    use PreferredValuesTrait;

    public readonly ComponentPropertyTypeEnum $type;
    public readonly ?string $defaultValue;
    /**
     * @var string[]|null
     */
    public readonly ?array $variantOptions;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->type = ComponentPropertyTypeEnum::from($data['type']);
        $this->defaultValue = $data['defaultValue'];
        $this->variantOptions = $data['variantOptions'] ?? null;
    }
}
