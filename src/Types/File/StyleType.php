<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\DescriptionTrait;
use Turker\FigmaAPI\Traits\KeyTrait;
use Turker\FigmaAPI\Traits\NameTrait;
use Turker\FigmaAPI\Traits\RemoteTrait;
use Turker\FigmaAPI\Traits\StyleTypeTrait;
use Turker\FigmaAPI\Types\AbstractType;

class StyleType extends AbstractType
{
    use KeyTrait;
    use NameTrait;
    use RemoteTrait;
    use DescriptionTrait;
    use StyleTypeTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
