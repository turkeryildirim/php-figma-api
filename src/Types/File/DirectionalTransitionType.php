<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\DirectionalTransitionTypeEnum;
use Turker\FigmaAPI\Enums\File\DirectionEnum;
use Turker\FigmaAPI\Traits\DurationTrait;
use Turker\FigmaAPI\Traits\EasingTrait;
use Turker\FigmaAPI\Types\AbstractType;

class DirectionalTransitionType extends AbstractType
{
    use DurationTrait;
    use EasingTrait;

    public readonly DirectionalTransitionTypeEnum $type;
    public readonly DirectionEnum $direction;
    public readonly bool $matchLayers;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->type        = DirectionalTransitionTypeEnum::tryFrom($data['type']);
        $this->direction   = DirectionEnum::tryFrom($data['direction']);
        $this->matchLayers = $data['matchLayers'] ?? false;
    }
}
