<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\CornerRadiusTrait;
use Turker\FigmaAPI\Traits\CornerSmoothingTrait;
use Turker\FigmaAPI\Traits\RectangleCornerRadiiTrait;

class RectangleNodeType extends VectorNodeType
{
    use CornerRadiusTrait;
    use CornerSmoothingTrait;
    use RectangleCornerRadiiTrait;

    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
