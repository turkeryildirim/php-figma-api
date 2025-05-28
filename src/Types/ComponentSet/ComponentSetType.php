<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\ComponentSet;

use Turker\FigmaAPI\Types\Component\ComponentType;

class ComponentSetType extends ComponentType
{
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
