<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\DirectionalTransitionTypeEnum;
use Turker\FigmaAPI\Enums\File\DirectionEnum;
use Turker\FigmaAPI\Traits\DurationTrait;
use Turker\FigmaAPI\Traits\EasingTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class DirectionalTransitionType extends AbstractType
{
    use DurationTrait;
    use EasingTrait;

    public readonly ?string $type;
    public readonly ?string $direction;
    public readonly ?bool $matchLayers;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->type        = Helper::makeFromEnum($data['type'], DirectionalTransitionTypeEnum::class);
        $this->direction   = Helper::makeFromEnum($data['direction'], DirectionEnum::class);
        $this->matchLayers = Helper::makeBoolean($data['matchLayers'], false);
    }
}
