<?php

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\LayoutGridAlignmentEnum;
use Turker\FigmaAPI\Enums\File\LayoutGridPatternEnum;
use Turker\FigmaAPI\Traits\BoundVariablesTrait;
use Turker\FigmaAPI\Traits\ColorTrait;
use Turker\FigmaAPI\Traits\VisibleTrait;
use Turker\FigmaAPI\Types\AbstractType;

class LayoutGridType extends AbstractType
{
    use VisibleTrait;
    use ColorTrait;
    use BoundVariablesTrait;

    public readonly LayoutGridPatternEnum $pattern;
    public readonly int|float $sectionSize;
    public readonly LayoutGridAlignmentEnum $alignment;
    public readonly int|float $gutterSize;
    public readonly int|float $offset;
    public readonly int|float $count;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);

        $this->count       = $data['count'];
        $this->offset      = $data['offset'];
        $this->gutterSize  = $data['gutterSize'];
        $this->sectionSize = $data['sectionSize'];
        $this->pattern     = LayoutGridPatternEnum::tryFrom($data['pattern']);
        $this->alignment   = LayoutGridAlignmentEnum::tryFrom($data['alignment']);
    }
}
