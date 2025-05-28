<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\Comment;

use Turker\FigmaAPI\Traits\CommentPinCornerTrait;
use Turker\FigmaAPI\Traits\NodeIdTrait;
use Turker\FigmaAPI\Traits\NodeOffsetTrait;
use Turker\FigmaAPI\Traits\RegionHeightTrait;
use Turker\FigmaAPI\Traits\RegionWidthTrait;
use Turker\FigmaAPI\Types\AbstractType;

class FrameOffsetRegionType extends AbstractType
{
    use NodeIdTrait;
    use NodeOffsetTrait;
    use RegionHeightTrait;
    use RegionWidthTrait;
    use CommentPinCornerTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
