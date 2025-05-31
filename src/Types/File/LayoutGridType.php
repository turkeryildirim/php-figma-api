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

    public readonly ?string $pattern;
    public readonly int|float|null $sectionSize;
    public readonly ?string $alignment;
    public readonly int|float|null $gutterSize;
    public readonly int|float|null $offset;
    public readonly int|float|null $count;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);

        $this->count       = Helper::makeInteger($data['count']);
        $this->offset      = Helper::makeInteger($data['offset']);
        $this->gutterSize  = Helper::makeInteger($data['gutterSize']);
        $this->sectionSize = Helper::makeInteger($data['sectionSize']);
        $this->pattern     = Helper::makeFromEnum($data['pattern'], LayoutGridPatternEnum::class);
        $this->alignment   = Helper::makeFromEnum($data['alignment'], LayoutGridAlignmentEnum::class);
    }
}
