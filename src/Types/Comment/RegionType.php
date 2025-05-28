<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\Comment;

use Turker\FigmaAPI\Traits\CommentPinCornerTrait;
use Turker\FigmaAPI\Traits\RegionHeightTrait;
use Turker\FigmaAPI\Traits\RegionWidthTrait;
use Turker\FigmaAPI\Traits\XTrait;
use Turker\FigmaAPI\Traits\YTrait;
use Turker\FigmaAPI\Types\AbstractType;

class RegionType extends AbstractType
{
    use XTrait;
    use YTrait;
    use RegionHeightTrait;
    use RegionWidthTrait;
    use CommentPinCornerTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
