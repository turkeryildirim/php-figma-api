<?php

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\TypeTrait;
use Turker\FigmaAPI\Types\AbstractType;

class VariableAliasType extends AbstractType
{
    use IdTrait;
    use TypeTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
