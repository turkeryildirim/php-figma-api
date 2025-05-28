<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\DescriptionTrait;
use Turker\FigmaAPI\Traits\DocumentationLinksTrait;
use Turker\FigmaAPI\Traits\KeyTrait;
use Turker\FigmaAPI\Traits\NameTrait;
use Turker\FigmaAPI\Traits\RemoteTrait;
use Turker\FigmaAPI\Types\AbstractType;

class ComponentSetType extends AbstractType
{
    use KeyTrait;
    use NameTrait;
    use DescriptionTrait;
    use RemoteTrait;
    use DocumentationLinksTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
