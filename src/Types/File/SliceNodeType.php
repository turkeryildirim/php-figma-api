<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\AbsoluteBoundingBoxTrait;
use Turker\FigmaAPI\Traits\AbsoluteRenderBoundsTrait;
use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\RelativeTransformTrait;
use Turker\FigmaAPI\Traits\SizeTrait;
use Turker\FigmaAPI\Types\AbstractType;

class SliceNodeType extends AbstractType
{
    use IdTrait;
    use AbsoluteRenderBoundsTrait;
    use AbsoluteBoundingBoxTrait;
    use RelativeTransformTrait;
    use SizeTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
