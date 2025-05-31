<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\EffectTypeEnum;
use Turker\FigmaAPI\Traits\BlendModeTrait;
use Turker\FigmaAPI\Traits\BoundVariablesTrait;
use Turker\FigmaAPI\Traits\ColorTrait;
use Turker\FigmaAPI\Traits\VisibleTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Types\Common\VectorType;
use Turker\FigmaAPI\Util\Helper;

class EffectType extends AbstractType
{
    use VisibleTrait;
    use ColorTrait;
    use BlendModeTrait;
    use BoundVariablesTrait;

    public readonly ?string $type;
    public readonly int|float|null $radius;
    public readonly ?bool $showShadowBehindNode;
    public readonly ?string $blendMode;
    public readonly ?VectorType $offset;
    public readonly int|float|null $spread;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);

        $this->type                 = Helper::makeFromEnum($data['type'], EffectTypeEnum::class);
        $this->radius               = Helper::makeInteger($data['radius']);
        $this->showShadowBehindNode = Helper::makeBoolean($data['showShadowBehindNode'], false);
        $this->offset               = Helper::makeObject($data['offset'], VectorType::class);
        $this->spread               = Helper::makeInteger($data['spread'], 0);
    }
}
