<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\AbsoluteBoundingBoxTrait;
use Turker\FigmaAPI\Traits\AbsoluteRenderBoundsTrait;
use Turker\FigmaAPI\Traits\BlendModeTrait;
use Turker\FigmaAPI\Traits\CharactersTrait;
use Turker\FigmaAPI\Traits\EffectsTrait;
use Turker\FigmaAPI\Traits\FillsTrait;
use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\LockedTrait;
use Turker\FigmaAPI\Traits\OpacityTrait;
use Turker\FigmaAPI\Traits\RelativeTransformTrait;
use Turker\FigmaAPI\Types\AbstractType;

class StickyNodeType extends AbstractType
{
    use IdTrait;
    use AbsoluteBoundingBoxTrait;
    use AbsoluteRenderBoundsTrait;
    use BlendModeTrait;
    use CharactersTrait;
    use EffectsTrait;
    use FillsTrait;
    use LockedTrait;
    use OpacityTrait;
    use RelativeTransformTrait;

    public readonly bool $authorVisible;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->authorVisible = $data['authorVisible'] ?? false;
    }
}
