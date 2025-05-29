<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\AbsoluteBoundingBoxTrait;
use Turker\FigmaAPI\Traits\AbsoluteRenderBoundsTrait;
use Turker\FigmaAPI\Traits\BlendModeTrait;
use Turker\FigmaAPI\Traits\ConstraintsTrait;
use Turker\FigmaAPI\Traits\EffectsTrait;
use Turker\FigmaAPI\Traits\FillsTrait;
use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\IsMaskTrait;
use Turker\FigmaAPI\Traits\LayoutAlignTrait;
use Turker\FigmaAPI\Traits\LockedTrait;
use Turker\FigmaAPI\Traits\OpacityTrait;
use Turker\FigmaAPI\Traits\PreserveRatioTrait;
use Turker\FigmaAPI\Traits\RelativeTransformTrait;
use Turker\FigmaAPI\Traits\SizeTrait;
use Turker\FigmaAPI\Traits\StrokeAlignTrait;
use Turker\FigmaAPI\Traits\StrokeCapTrait;
use Turker\FigmaAPI\Traits\StrokeDashesTrait;
use Turker\FigmaAPI\Traits\StrokeJoinTrait;
use Turker\FigmaAPI\Traits\StrokesTrait;
use Turker\FigmaAPI\Traits\StrokeWeightTrait;
use Turker\FigmaAPI\Traits\StylesTrait;
use Turker\FigmaAPI\Traits\TransitionDurationTrait;
use Turker\FigmaAPI\Traits\TransitionEasingTrait;
use Turker\FigmaAPI\Traits\TransitionNodeIDTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class VectorNodeType extends AbstractType
{
    use IdTrait;
    use LockedTrait;
    use PreserveRatioTrait;
    use IsMaskTrait;
    use OpacityTrait;
    use TransitionNodeIDTrait;
    use TransitionDurationTrait;
    use SizeTrait;
    use StrokesTrait;
    use StrokeWeightTrait;
    use StrokeDashesTrait;
    use StrokeAlignTrait;
    use StrokeCapTrait;
    use StrokeJoinTrait;
    use RelativeTransformTrait;
    use BlendModeTrait;
    use LayoutAlignTrait;
    use ConstraintsTrait;
    use TransitionEasingTrait;
    use AbsoluteRenderBoundsTrait;
    use AbsoluteBoundingBoxTrait;
    use StylesTrait;
    use EffectsTrait;
    use FillsTrait;

    public readonly int|float $layoutGrow;
    /**
     * @var PathType[]|null
     */
    public readonly ?array $fillGeometry;
    /**
     * @var PaintOverrideType[]|null
     */
    public readonly ?array $fillOverrideTable;
    public readonly ?StrokeWeightsType $individualStrokeWeights;

    public readonly int|float|null $strokeMiterAngle;
    /**
     * @var PathType[]|null
     */
    public readonly ?array $strokeGeometry;


    public function __construct(array $data)
    {
        $this->runTraitMethods($data);

        $this->layoutGrow       = Helper::makeInteger($data['layoutGrow'], 0);
        $this->strokeMiterAngle = $data['strokeMiterAngle'] ?? null;

        $this->individualStrokeWeights = !empty($data['individualStrokeWeights']) ?
            new StrokeWeightsType($data['individualStrokeWeights']) : null;

        $fillGeometry = null;
        if (!empty($data['fillGeometry']) && is_array($data['fillGeometry'])) {
            $fillGeometry = [];
            foreach ($data['fillGeometry'] as $fill) {
                $fillGeometry[] = new PathType($fill);
            }
        }
        $this->fillGeometry = $fillGeometry;

        $fillOverrideTable = null;
        if (!empty($data['fillOverrideTable']) && is_array($data['fillOverrideTable'])) {
            $fillOverrideTable = [];
            foreach ($data['fillOverrideTable'] as $fill) {
                $fillOverrideTable[] = new PaintOverrideType($fill);
            }
        }
        $this->fillOverrideTable = $fillOverrideTable;

        $strokeGeometry = null;
        if (!empty($data['strokeGeometry']) && is_array($data['strokeGeometry'])) {
            $strokeGeometry = [];
            foreach ($data['strokeGeometry'] as $stroke) {
                $strokeGeometry[] = new PathType($stroke);
            }
        }
        $this->strokeGeometry = $strokeGeometry;
    }
}
