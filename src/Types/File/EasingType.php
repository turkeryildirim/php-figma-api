<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\EasingTypeEnum;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class EasingType extends AbstractType
{
    public readonly ?string $type;
    public readonly ?EasingFunctionCubicBezierType $easingFunctionCubicBezier;
    public readonly ?EasingFunctionSpringType $easingFunctionSpring;

    public function __construct(array $data)
    {
        $this->type = Helper::makeFromEnum($data['type'], EasingTypeEnum::class);

        $this->easingFunctionCubicBezier = Helper::makeObject(
            $data['easingFunctionCubicBezier'],
            EasingFunctionCubicBezierType::class
        );

        $this->easingFunctionSpring = Helper::makeObject(
            $data['easingFunctionSpring'],
            EasingFunctionSpringType::class
        );
    }
}
