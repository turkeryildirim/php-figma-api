<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\BoundVariablesTrait;
use Turker\FigmaAPI\Traits\ColorTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class ColorStopType extends AbstractType
{
    use ColorTrait;
    use BoundVariablesTrait;

    public readonly int|float|null $position;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->position = Helper::makeInteger($data['position']);
    }
}
