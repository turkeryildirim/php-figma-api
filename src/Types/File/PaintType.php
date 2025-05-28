<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\PaintSolidScaleModeEnum;
use Turker\FigmaAPI\Enums\File\PaintTypeEnum;
use Turker\FigmaAPI\Traits\BlendModeTrait;
use Turker\FigmaAPI\Traits\BoundVariablesTrait;
use Turker\FigmaAPI\Traits\ColorTrait;
use Turker\FigmaAPI\Traits\OpacityTrait;
use Turker\FigmaAPI\Traits\VisibleTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Types\Common\VectorType;
use Turker\FigmaAPI\Util\Helper;

class PaintType extends AbstractType
{
    use VisibleTrait;
    use ColorTrait;
    use BlendModeTrait;
    use OpacityTrait;
    use BoundVariablesTrait;

    public readonly PaintTypeEnum $type;
     /**
     * @var VectorType[]|null
     */
    public readonly ?array $gradientHandlePositions;
    /**
     * @var ColorStopType[]|null
     */
    public readonly ?array $gradientStops;
    public readonly ?PaintSolidScaleModeEnum $scaleMode;
    public readonly ?array $imageTransform;
    public readonly int|float|null $scalingFactor;
    public readonly int|float|null $rotation;
    public readonly ?string $imageRef;
    /**
     * @var ImageFiltersType[]|null
     */
    public readonly ?array $filters;
    public readonly ?string $gifRef;


    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->type = PaintTypeEnum::from($data['type']);

        $gradientHandlePositions = null;
        if (!empty($data['gradientHandlePositions']) && is_array($data['gradientHandlePositions'])) {
            $gradientHandlePositions = [];
            foreach ($data['gradientHandlePositions'] as $vector) {
                $gradientHandlePositions[] = new VectorType($vector);
            }
        }
        $this->gradientHandlePositions = $gradientHandlePositions;

        $gradientStops = null;
        if (!empty($data['gradientStops']) && is_array($data['gradientStops'])) {
            $gradientStops = [];
            foreach ($data['gradientStops'] as $color) {
                $gradientStops[] = new ColorStopType($color);
            }
        }
        $this->gradientStops = $gradientStops;

        $this->scaleMode = ( !empty($data['scaleMode']) && PaintSolidScaleModeEnum::hasValue($data['scaleMode']) )
            ? PaintSolidScaleModeEnum::tryFrom($data['scaleMode']) : null;

        $this->imageTransform = !empty($data['imageTransform']) ?
            Helper::toArrayMatrix($data['imageTransform']) : null;

        $this->scalingFactor = !empty($data['scalingFactor']) ? $data['scalingFactor'] : null;
        $this->rotation = !empty($data['rotation']) ? $data['rotation'] : null;
        $this->imageRef = $data['imageRef'] ?? null;
        $this->gifRef = $data['gifRef'] ?? null;

        $filters = null;
        if (!empty($data['filters']) && is_array($data['filters'])) {
            $filters = [];
            foreach ($data['filters'] as $filter) {
                $filters[] = new ImageFiltersType($filter);
            }
        }
        $this->filters = $filters;
    }
}
