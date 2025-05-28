<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\ShapeTypeEnum;
use Turker\FigmaAPI\Traits\AbsoluteBoundingBoxTrait;
use Turker\FigmaAPI\Traits\AbsoluteRenderBoundsTrait;
use Turker\FigmaAPI\Traits\BackgroundColorTrait;
use Turker\FigmaAPI\Traits\BlendModeTrait;
use Turker\FigmaAPI\Traits\CharactersTrait;
use Turker\FigmaAPI\Traits\CornerRadiusTrait;
use Turker\FigmaAPI\Traits\CornerSmoothingTrait;
use Turker\FigmaAPI\Traits\EffectsTrait;
use Turker\FigmaAPI\Traits\FillsTrait;
use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\IsMaskTrait;
use Turker\FigmaAPI\Traits\LockedTrait;
use Turker\FigmaAPI\Traits\OpacityTrait;
use Turker\FigmaAPI\Traits\RectangleCornerRadiiTrait;
use Turker\FigmaAPI\Traits\RelativeTransformTrait;
use Turker\FigmaAPI\Traits\StrokeAlignTrait;
use Turker\FigmaAPI\Traits\StrokeCapTrait;
use Turker\FigmaAPI\Traits\StrokeDashesTrait;
use Turker\FigmaAPI\Traits\StrokeJoinTrait;
use Turker\FigmaAPI\Traits\StrokesTrait;
use Turker\FigmaAPI\Traits\StrokeWeightTrait;
use Turker\FigmaAPI\Traits\StylesTrait;
use Turker\FigmaAPI\Types\AbstractType;

class ShapeNodeType extends AbstractType
{
    use IdTrait;
    use AbsoluteBoundingBoxTrait;
    use AbsoluteRenderBoundsTrait;
    use BackgroundColorTrait;
    use BlendModeTrait;
    use CharactersTrait;
    use CornerRadiusTrait;
    use CornerSmoothingTrait;
    use RectangleCornerRadiiTrait;
    use EffectsTrait;
    use FillsTrait;
    use IsMaskTrait;
    use LockedTrait;
    use OpacityTrait;
    use StrokesTrait;
    use StrokeWeightTrait;
    use StrokeAlignTrait;
    use StrokeDashesTrait;
    use StrokeCapTrait;
    use StrokeJoinTrait;
    use RelativeTransformTrait;
    use StylesTrait;

    public readonly ?ShapeTypeEnum $shapeType;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);

        $this->shapeType = ( !empty($data['shapeType']) && ShapeTypeEnum::hasValue($data['shapeType']) )
            ? ShapeTypeEnum::tryFrom($data['shapeType']) : null;
    }
}
