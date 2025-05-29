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
    public readonly bool $clipsContent;
    public readonly LayoutModeEnum $layoutMode;
    public readonly ?LayoutSizingEnum $layoutSizingHorizontal;
    public readonly ?LayoutSizingEnum $layoutSizingVertical;
    public readonly ?LayoutWrapEnum $layoutWrap;
    public readonly AxisSizingModeEnum $primaryAxisSizingMode;
    public readonly AxisSizingModeEnum $counterAxisSizingMode;
    public readonly AxisAlignModeEnum $primaryAxisAlignItems;
    public readonly AxisAlignModeEnum $counterAxisAlignItems;
    public readonly AxisAlignModeEnum $counterAxisAlignContent;
    public readonly int|float $paddingLeft;
    public readonly int|float $paddingRight;
    public readonly int|float $paddingTop;
    public readonly int|float $paddingBottom;
    public readonly int|float $horizontalPadding;
    public readonly int|float $verticalPadding;
    public readonly int|float $itemSpacing;
    public readonly int|float $counterAxisSpacing;
    public readonly PositionEnum $position;
    public readonly bool $itemReverseZIndex;
    public readonly bool $strokesIncludedInLayout;
    public readonly bool $isMaskOutline;
    /**
     * @var LayoutGridType[]|null
     */
    public readonly ?array $layoutGrids;
    public readonly ?OverflowDirectionEnum $overflowDirection;
    public readonly ?MaskTypeEnum $maskType;


    public function __construct(array $data)
    {
        $this->runTraitMethods($data);

        $this->minWidth                = Helper::makeInteger($data['minWidth']);
        $this->maxWidth                = Helper::makeInteger($data['maxWidth']);
        $this->minHeight               = Helper::makeInteger($data['minHeight']);
        $this->maxHeight               = Helper::makeInteger($data['maxHeight']) ;
        $this->isMaskOutline           = $data['isMaskOutline'] ?? false;
        $this->clipsContent            = $data['clipsContent'] ?? false;
        $this->itemReverseZIndex       = $data['itemReverseZIndex'] ?? false;
        $this->strokesIncludedInLayout = $data['strokesIncludedInLayout'] ?? false;
        $this->paddingLeft             = Helper::makeInteger($data['paddingLeft'], 0);
        $this->paddingRight            = Helper::makeInteger($data['paddingRight'], 0);
        $this->paddingTop              = Helper::makeInteger($data['paddingTop'], 0);
        $this->paddingBottom           = Helper::makeInteger($data['paddingBottom'], 0);
        $this->horizontalPadding       = Helper::makeInteger($data['horizontalPadding'], 0);
        $this->verticalPadding         = Helper::makeInteger($data['verticalPadding'], 0);
        $this->itemSpacing             = Helper::makeInteger($data['itemSpacing'], 0);
        $this->counterAxisSpacing      = Helper::makeInteger($data['counterAxisSpacing'], 0);

        $mode                    = $data['overflowDirection'] ?? 'NONE';
        $this->overflowDirection = OverflowDirectionEnum::from($mode);

        $mode           = $data['position'] ?? 'AUTO';
        $this->position = PositionEnum::from($mode);

        $mode = $data['counterAxisAlignContent'] ?? 'AUTO';
        $this->counterAxisAlignContent = AxisAlignModeEnum::from($mode);

        $mode = $data['primaryAxisAlignItems'] ?? 'MIN';
        $this->primaryAxisAlignItems = AxisAlignModeEnum::from($mode);

        $mode = $data['counterAxisAlignItems'] ?? 'MIN';
        $this->counterAxisAlignItems = AxisAlignModeEnum::from($mode);

        $mode             = $data['layoutMode'] ?? 'NONE';
        $this->layoutMode = LayoutModeEnum::from($mode);

        $mode = $data['primaryAxisSizingMode'] ?? 'AUTO';
        $this->primaryAxisSizingMode = AxisSizingModeEnum::from($mode);

        $mode = $data['counterAxisSizingMode'] ?? 'AUTO';
        $this->counterAxisSizingMode = AxisSizingModeEnum::from($mode);

        $this->maskType = ( !empty($data['maskType']) && MaskTypeEnum::hasValue($data['maskType']) )
            ? MaskTypeEnum::tryFrom($data['maskType']) : null;

        $this->layoutSizingHorizontal = ( !empty($data['layoutSizingHorizontal']) && LayoutSizingEnum::hasValue($data['layoutSizingHorizontal']) )
            ? LayoutSizingEnum::tryFrom($data['layoutSizingHorizontal']) : null;

        $this->layoutSizingVertical = ( !empty($data['layoutSizingVertical']) && LayoutSizingEnum::hasValue($data['layoutSizingVertical']) )
            ? LayoutSizingEnum::tryFrom($data['layoutSizingVertical']) : null;

        $this->layoutWrap = ( !empty($data['layoutWrap']) && LayoutWrapEnum::hasValue($data['layoutWrap']) )
            ? LayoutWrapEnum::tryFrom($data['layoutWrap']) : null;

        $this->targetAspectRatio = !empty($data['targetAspectRatio']) ?
            new VectorType($data['targetAspectRatio']) : null;

        $interactions = null;
        if (!empty($data['interactions']) && is_array($data['interactions'])) {
            $interactions = [];
            foreach ($data['interactions'] as $interaction) {
                $interactions[] = new InteractionType($interaction);
            }
        }
        $this->interactions = $interactions;

        $layoutGrids = null;
        if (!empty($data['layoutGrids']) && is_array($data['layoutGrids'])) {
            $layoutGrids = [];
            foreach ($data['layoutGrids'] as $layoutGrid) {
                $layoutGrids[] = new LayoutGridType($layoutGrid);
            }
        }
        $this->layoutGrids = $layoutGrids;
    }
}
