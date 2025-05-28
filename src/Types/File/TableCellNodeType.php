<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\AbsoluteBoundingBoxTrait;
use Turker\FigmaAPI\Traits\AbsoluteRenderBoundsTrait;
use Turker\FigmaAPI\Traits\CharactersTrait;
use Turker\FigmaAPI\Traits\FillsTrait;
use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\RelativeTransformTrait;
use Turker\FigmaAPI\Traits\SizeTrait;
use Turker\FigmaAPI\Types\AbstractType;

class TableCellNodeType extends AbstractType
{
    use IdTrait;
    use AbsoluteRenderBoundsTrait;
    use AbsoluteBoundingBoxTrait;
    use RelativeTransformTrait;
    use CharactersTrait;
    use FillsTrait;
    use SizeTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
