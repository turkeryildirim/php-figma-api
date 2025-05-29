<?php

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\LayoutConstraintHorizontalEnum;
use Turker\FigmaAPI\Enums\File\LayoutConstraintVerticalEnum;
use Turker\FigmaAPI\Types\AbstractType;

class LayoutConstraintType extends AbstractType
{
    public readonly ?LayoutConstraintVerticalEnum $vertical;
    public readonly ?LayoutConstraintHorizontalEnum $horizontal;
    public function __construct(array $data)
    {
        $this->vertical = ( isset($data['vertical']) && LayoutConstraintVerticalEnum::hasValue($data['vertical']) )
            ? LayoutConstraintVerticalEnum::tryFrom($data['vertical']) : null;

        $this->horizontal = ( isset($data['horizontal']) && LayoutConstraintHorizontalEnum::hasValue($data['horizontal']) )
            ? LayoutConstraintHorizontalEnum::tryFrom($data['horizontal']) : null;
    }
}
