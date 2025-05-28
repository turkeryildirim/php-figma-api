<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\ConnectorLineTypeEnum;
use Turker\FigmaAPI\Enums\File\ConnectorStrokeCapEnum;
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

class ConnectorNodeType extends AbstractType
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
    use StrokeDashesTrait;
    use StrokeCapTrait;
    use StrokeJoinTrait;
    use StrokeAlignTrait;
    use RelativeTransformTrait;
    use StylesTrait;

    public readonly ConnectorEndpointType $connectorStart;
    public readonly ConnectorEndpointType $connectorEnd;
    public readonly ConnectorStrokeCapEnum $connectorStartStrokeCap;
    public readonly ConnectorStrokeCapEnum $connectorEndStrokeCap;
    public readonly ?ConnectorLineTypeEnum $connectorLineType;
    public readonly ?ConnectorTextBackgroundType $textBackground;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);

        $this->connectorStartStrokeCap = ( !empty($data['connectorStartStrokeCap']) && ConnectorStrokeCapEnum::hasValue($data['connectorStartStrokeCap']) )
            ? ConnectorStrokeCapEnum::tryFrom($data['connectorStartStrokeCap']) : ConnectorStrokeCapEnum::from('NONE');

        $this->connectorEndStrokeCap = ( !empty($data['connectorEndStrokeCap']) && ConnectorStrokeCapEnum::hasValue($data['connectorEndStrokeCap']) )
            ? ConnectorStrokeCapEnum::tryFrom($data['connectorEndStrokeCap']) : ConnectorStrokeCapEnum::from('NONE');

        $this->connectorLineType = (!empty($data['connectorLineType'])) ?
            ConnectorLineTypeEnum::tryFrom($data['connectorLineType']) : null;

        $this->connectorStart = new ConnectorEndpointType($data['connectorStart']);
        $this->connectorEnd = new ConnectorEndpointType($data['connectorEnd']);
        $this->textBackground = !empty($data['textBackground']) ?
            new ConnectorTextBackgroundType($data['textBackground']) : null;
    }
}
