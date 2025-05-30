<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\AxisAlignModeEnum;
use Turker\FigmaAPI\Enums\File\AxisSizingModeEnum;
use Turker\FigmaAPI\Enums\File\LayoutModeEnum;
use Turker\FigmaAPI\Enums\File\LayoutSizingEnum;
use Turker\FigmaAPI\Enums\File\LayoutWrapEnum;
use Turker\FigmaAPI\Enums\File\MaskTypeEnum;
use Turker\FigmaAPI\Enums\File\OverflowDirectionEnum;
use Turker\FigmaAPI\Enums\File\PositionEnum;
use Turker\FigmaAPI\Traits\AbsoluteBoundingBoxTrait;
use Turker\FigmaAPI\Traits\AbsoluteRenderBoundsTrait;
use Turker\FigmaAPI\Traits\BlendModeTrait;
use Turker\FigmaAPI\Traits\ChildrenTrait;
use Turker\FigmaAPI\Traits\ConstraintsTrait;
use Turker\FigmaAPI\Traits\CornerRadiusTrait;
use Turker\FigmaAPI\Traits\CornerSmoothingTrait;
use Turker\FigmaAPI\Traits\DevStatusTrait;
use Turker\FigmaAPI\Traits\EffectsTrait;
use Turker\FigmaAPI\Traits\FillsTrait;
use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\IsMaskTrait;
use Turker\FigmaAPI\Traits\LayoutAlignTrait;
use Turker\FigmaAPI\Traits\LockedTrait;
use Turker\FigmaAPI\Traits\OpacityTrait;
use Turker\FigmaAPI\Traits\PreserveRatioTrait;
use Turker\FigmaAPI\Traits\RectangleCornerRadiiTrait;
use Turker\FigmaAPI\Traits\RelativeTransformTrait;
use Turker\FigmaAPI\Traits\SizeTrait;
use Turker\FigmaAPI\Traits\StrokeAlignTrait;
use Turker\FigmaAPI\Traits\StrokeDashesTrait;
use Turker\FigmaAPI\Traits\StrokesTrait;
use Turker\FigmaAPI\Traits\StrokeWeightTrait;
use Turker\FigmaAPI\Traits\StylesTrait;
use Turker\FigmaAPI\Traits\TransitionDurationTrait;
use Turker\FigmaAPI\Traits\TransitionEasingTrait;
use Turker\FigmaAPI\Traits\TransitionNodeIDTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Types\Common\VectorType;
use Turker\FigmaAPI\Util\Helper;

class FrameNodeType extends AbstractType
{
    use IdTrait;
    use ChildrenTrait;
    use IsMaskTrait;
    use LockedTrait;
    use FillsTrait;
    use StrokesTrait;
    use StrokeWeightTrait;
    use StrokeAlignTrait;
    use StrokeDashesTrait;
    use CornerRadiusTrait;
    use RectangleCornerRadiiTrait;
    use CornerSmoothingTrait;
    use BlendModeTrait;
    use PreserveRatioTrait;
    use ConstraintsTrait;
    use LayoutAlignTrait;
    use TransitionNodeIDTrait;
    use TransitionDurationTrait;
    use TransitionEasingTrait;
    use OpacityTrait;
    use AbsoluteBoundingBoxTrait;
    use AbsoluteRenderBoundsTrait;
    use SizeTrait;
    use RelativeTransformTrait;
    use EffectsTrait;
    use StylesTrait;
    use DevStatusTrait;

    public readonly ?VectorType $targetAspectRatio;
    /**
     * @var InteractionType[]|null
     */
    public readonly ?array $interactions;
    public readonly int|float|null $minWidth;
    public readonly int|float|null $maxWidth;
    public readonly int|float|null $minHeight;
    public readonly int|float|null $maxHeight;
    public readonly ?bool $clipsContent;
    public readonly ?string $layoutMode;
    public readonly ?string $layoutSizingHorizontal;
    public readonly ?string $layoutSizingVertical;
    public readonly ?string $layoutWrap;
    public readonly ?string $primaryAxisSizingMode;
    public readonly ?string $counterAxisSizingMode;
    public readonly ?string $primaryAxisAlignItems;
    public readonly ?string $counterAxisAlignItems;
    public readonly ?string $counterAxisAlignContent;
    public readonly int|float|null $paddingLeft;
    public readonly int|float|null $paddingRight;
    public readonly int|float|null $paddingTop;
    public readonly int|float|null $paddingBottom;
    public readonly int|float|null $horizontalPadding;
    public readonly int|float|null $verticalPadding;
    public readonly int|float|null $itemSpacing;
    public readonly int|float|null $counterAxisSpacing;
    public readonly ?string $position;
    public readonly ?bool $itemReverseZIndex;
    public readonly ?bool $strokesIncludedInLayout;
    public readonly ?bool $isMaskOutline;
    /**
     * @var LayoutGridType[]|null
     */
    public readonly ?array $layoutGrids;
    public readonly ?string $overflowDirection;
    public readonly ?string $maskType;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);

        $this->minWidth                = Helper::makeInteger($data['minWidth']);
        $this->maxWidth                = Helper::makeInteger($data['maxWidth']);
        $this->minHeight               = Helper::makeInteger($data['minHeight']);
        $this->maxHeight               = Helper::makeInteger($data['maxHeight']) ;
        $this->isMaskOutline           = Helper::makeBoolean($data['isMaskOutline'], false);
        $this->clipsContent            = Helper::makeBoolean($data['clipsContent'], false);
        $this->itemReverseZIndex       = Helper::makeBoolean($data['itemReverseZIndex'], false);
        $this->strokesIncludedInLayout = Helper::makeBoolean($data['strokesIncludedInLayout'], false);
        $this->paddingLeft             = Helper::makeInteger($data['paddingLeft'], 0);
        $this->paddingRight            = Helper::makeInteger($data['paddingRight'], 0);
        $this->paddingTop              = Helper::makeInteger($data['paddingTop'], 0);
        $this->paddingBottom           = Helper::makeInteger($data['paddingBottom'], 0);
        $this->horizontalPadding       = Helper::makeInteger($data['horizontalPadding'], 0);
        $this->verticalPadding         = Helper::makeInteger($data['verticalPadding'], 0);
        $this->itemSpacing             = Helper::makeInteger($data['itemSpacing'], 0);
        $this->counterAxisSpacing      = Helper::makeInteger($data['counterAxisSpacing'], 0);

        $this->overflowDirection       = Helper::makeFromEnum(
            $data['overflowDirection'],
            OverflowDirectionEnum::class,
            OverflowDirectionEnum::NONE->value
        );
        $this->position                = Helper::makeFromEnum(
            $data['position'],
            PositionEnum::class,
            PositionEnum::AUTO->value
        );
        $this->counterAxisAlignContent = Helper::makeFromEnum(
            $data['counterAxisAlignContent'],
            AxisAlignModeEnum::class,
            AxisAlignModeEnum::AUTO->value
        );
        $this->primaryAxisAlignItems   = Helper::makeFromEnum(
            $data['primaryAxisAlignItems'],
            AxisAlignModeEnum::class,
            AxisAlignModeEnum::MIN->value
        );
        $this->counterAxisAlignItems   = Helper::makeFromEnum(
            $data['counterAxisAlignItems'],
            AxisAlignModeEnum::class,
            AxisAlignModeEnum::MIN->value
        );
        $this->layoutMode              = Helper::makeFromEnum(
            $data['layoutMode'],
            LayoutModeEnum::class,
            LayoutModeEnum::NONE->value
        );
        $this->primaryAxisSizingMode   = Helper::makeFromEnum(
            $data['primaryAxisSizingMode'],
            AxisSizingModeEnum::class,
            AxisSizingModeEnum::AUTO->value
        );
        $this->counterAxisSizingMode   = Helper::makeFromEnum(
            $data['counterAxisSizingMode'],
            AxisSizingModeEnum::class,
            AxisSizingModeEnum::AUTO->value
        );
        $this->maskType                = Helper::makeFromEnum(
            $data['maskType'],
            MaskTypeEnum::class
        );
        $this->layoutSizingHorizontal  = Helper::makeFromEnum(
            $data['layoutSizingHorizontal'],
            LayoutSizingEnum::class
        );
        $this->layoutSizingVertical    = Helper::makeFromEnum(
            $data['layoutSizingVertical'],
            LayoutSizingEnum::class
        );
        $this->layoutWrap              = Helper::makeFromEnum(
            $data['layoutWrap'],
            LayoutWrapEnum::class
        );
        $this->targetAspectRatio       = Helper::makeObject(
            $data['targetAspectRatio'],
            VectorType::class
        );
        $this->interactions            = Helper::makeArrayOfObjects(
            $data['interactions'],
            InteractionType::class
        );
        $this->layoutGrids             = Helper::makeArrayOfObjects(
            $data['layoutGrids'],
            LayoutGridType::class
        );
    }
}
