<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;

class EasingFunctionSpringType extends AbstractType
{
    public readonly int|float $mass;
    public readonly int|float $stiffness;
    public readonly int|float $damping;

    public function __construct(array $data)
    {
        $this->mass      = $data['mass'];
        $this->stiffness = $data['stiffness'];
        $this->damping   = $data['damping'];
    }
}
