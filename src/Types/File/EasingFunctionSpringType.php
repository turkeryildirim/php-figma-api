<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class EasingFunctionSpringType extends AbstractType
{
    public readonly int|float|null $mass;
    public readonly int|float|null $stiffness;
    public readonly int|float|null $damping;

    public function __construct(array $data)
    {
        $this->mass      = Helper::makeInteger($data['mass']);
        $this->stiffness = Helper::makeInteger($data['stiffness']);
        $this->damping   = Helper::makeInteger($data['damping']);
    }
}
