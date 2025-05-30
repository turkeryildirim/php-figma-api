<?php

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\LayoutConstraintHorizontalEnum;
use Turker\FigmaAPI\Enums\File\LayoutConstraintVerticalEnum;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class LayoutConstraintType extends AbstractType
{
    public readonly ?string $vertical;
    public readonly ?string $horizontal;
    public function __construct(array $data)
    {
        $this->vertical = Helper::makeFromEnum(
            $data['vertical'],
            LayoutConstraintVerticalEnum::class
        );

        $this->horizontal = Helper::makeFromEnum(
            $data['horizontal'],
            LayoutConstraintHorizontalEnum::class
        );
    }
}
