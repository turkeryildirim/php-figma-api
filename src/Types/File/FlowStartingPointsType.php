<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\NameTrait;
use Turker\FigmaAPI\Traits\NodeIdTrait;
use Turker\FigmaAPI\Types\AbstractType;

class FlowStartingPointsType extends AbstractType
{
    use NodeIdTrait;
    use NameTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
