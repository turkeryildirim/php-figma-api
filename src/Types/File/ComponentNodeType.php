<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

class ComponentNodeType extends FrameNodeType
{
    /**
     * @var ComponentPropertyDefinitionType[]|null
     */
    public readonly ?array $componentPropertyDefinitions;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $componentPropertyDefinitions = null;
        if (!empty($data['componentPropertyDefinitions']) && is_array($data['componentPropertyDefinitions'])) {
            $componentPropertyDefinitions = [];
            foreach ($data['componentPropertyDefinitions'] as $value) {
                $componentPropertyDefinitions[] = new ComponentPropertyDefinitionType($value);
            }
        }
        $this->componentPropertyDefinitions = $componentPropertyDefinitions;
    }
}
