<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\EasingTypeEnum;
use Turker\FigmaAPI\Types\AbstractType;

class EasingType extends AbstractType
{
    public readonly EasingTypeEnum $type;
    public readonly ?EasingFunctionCubicBezierType $easingFunctionCubicBezier;
    public readonly ?EasingFunctionSpringType $easingFunctionSpring;

    public function __construct(array $data)
    {
        $this->type = EasingTypeEnum::tryFrom($data['type']);
        $this->easingFunctionCubicBezier = (!empty($data['easingFunctionCubicBezier'])) ?
            new EasingFunctionCubicBezierType($data['easingFunctionCubicBezier']) : null;
        $this->easingFunctionSpring = (!empty($data['easingFunctionSpring'])) ?
            new EasingFunctionSpringType($data['easingFunctionSpring']) : null;
    }
}
