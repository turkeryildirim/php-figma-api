<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Util\Helper;

class ComponentNodeType extends FrameNodeType
{
    /**
     * @var ComponentPropertyDefinitionType[]|null
     */
    public readonly ?array $componentPropertyDefinitions;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->componentPropertyDefinitions = Helper::makeArrayOfObjects($data['componentPropertyDefinitions'], ComponentPropertyDefinitionType::class);
    }
}
