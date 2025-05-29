<?php

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\LayoutGridAlignmentEnum;
use Turker\FigmaAPI\Enums\File\LayoutGridPatternEnum;
use Turker\FigmaAPI\Traits\BoundVariablesTrait;
use Turker\FigmaAPI\Traits\ColorTrait;
use Turker\FigmaAPI\Traits\VisibleTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

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

        $this->count       = Helper::makeInteger($data['count']);
        $this->offset      = Helper::makeInteger($data['offset']);
        $this->gutterSize  = Helper::makeInteger($data['gutterSize']);
        $this->sectionSize = Helper::makeInteger($data['sectionSize']);
        $this->pattern     = LayoutGridPatternEnum::tryFrom($data['pattern']);
        $this->alignment   = LayoutGridAlignmentEnum::tryFrom($data['alignment']);
    }
}
