<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\ComponentPropertyTypeEnum;
use Turker\FigmaAPI\Traits\PreferredValuesTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class ComponentPropertyDefinitionType extends AbstractType
{
    use PreferredValuesTrait;

    public readonly ?string $type;
    public readonly ?string $defaultValue;
    /**
     * @var string[]|null
     */
    public readonly ?array $variantOptions;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->type           = Helper::makeFromEnum($data['type'], ComponentPropertyTypeEnum::class);
        $this->defaultValue   = $data['defaultValue'];
        $this->variantOptions = $data['variantOptions'] ?? null;
    }
}
