<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Util\Helper;

class InstanceNodeType extends FrameNodeType
{
    public readonly string $componentId;
    public readonly ?bool $isExposedInstance;
    /**
     * @var string[]|null
     */
    public readonly ?array $exposedInstances;
    /**
     * @var ComponentPropertyType[]|null
     */
    public readonly ?array $componentProperties;
    /**
     * @var OverridesType[]|null
     */
    public readonly ?array $overrides;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->componentId       = $data['componentId'];
        $this->isExposedInstance = Helper::makeBoolean($data['isExposedInstance'], false);
        $this->exposedInstances  = $data['exposedInstances'] ?? null;

        $this->componentProperties = Helper::makeArrayOfObjects($data['componentProperties'], ComponentPropertyType::class);

        $this->overrides = Helper::makeArrayOfObjects($data['overrides'], OverridesType::class);
    }
}
