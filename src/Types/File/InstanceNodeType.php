<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

class InstanceNodeType extends FrameNodeType
{
    public readonly string $componentId;
    public readonly bool $isExposedInstance;
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
        $this->componentId = $data['componentId'];
        $this->isExposedInstance = $data['isExposedInstance'] ?? false;
        $this->exposedInstances = $data['exposedInstances'] ?? null;

        $componentProperties = null;
        if (!empty($data['componentProperties']) && is_array($data['componentProperties'])) {
            $componentProperties = [];
            foreach ($data['componentProperties'] as $v) {
                $componentProperties[] = new ComponentPropertyType($v);
            }
        }
        $this->componentProperties = $componentProperties;

        $overrides = null;
        if (!empty($data['overrides']) && is_array($data['overrides'])) {
            $overrides = [];
            foreach ($data['overrides'] as $v) {
                $overrides[] = new OverridesType($v);
            }
        }
        $this->overrides = $overrides;
    }
}
