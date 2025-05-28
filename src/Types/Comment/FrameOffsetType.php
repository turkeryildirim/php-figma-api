<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\Comment;

use Turker\FigmaAPI\Traits\NodeIdTrait;
use Turker\FigmaAPI\Traits\NodeOffsetTrait;
use Turker\FigmaAPI\Types\AbstractType;

class FrameOffsetType extends AbstractType
{
    use NodeIdTrait;
    use NodeOffsetTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
