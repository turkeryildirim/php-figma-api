<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\SimpleTransitionTypeEnum;
use Turker\FigmaAPI\Traits\DurationTrait;
use Turker\FigmaAPI\Traits\EasingTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class SimpleTransitionType extends AbstractType
{
    use DurationTrait;
    use EasingTrait;

    public readonly ?string $type;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->type = Helper::makeFromEnum($data['type'], SimpleTransitionTypeEnum::class);
    }
}
