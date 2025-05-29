<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\BlendModeEnum;
use Turker\FigmaAPI\Enums\File\EffectTypeEnum;
use Turker\FigmaAPI\Traits\BlendModeTrait;
use Turker\FigmaAPI\Traits\BoundVariablesTrait;
use Turker\FigmaAPI\Traits\ColorTrait;
use Turker\FigmaAPI\Traits\VisibleTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Types\Common\VectorType;

class EffectType extends AbstractType
{
    use VisibleTrait;
    use ColorTrait;
    use BlendModeTrait;
    use BoundVariablesTrait;

    public readonly EffectTypeEnum $type;
    public readonly int|float $radius;
    public readonly bool $showShadowBehindNode;
    public readonly ?BlendModeEnum $blendMode;
    public readonly ?VectorType $offset;
    public readonly int|float $spread;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);

        $this->type                 = EffectTypeEnum::from($data['type']);
        $this->radius               = $data['radius'];
        $this->showShadowBehindNode = $data['showShadowBehindNode'] ?? false;
        $this->offset               = !empty($data['offset']) ? new VectorType($data['offset']) : null;
        $this->spread               = intval($data['spread']) ?? 0;
    }
}
