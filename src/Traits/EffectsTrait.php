<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\EffectType;
use Turker\FigmaAPI\Util\Helper;

trait EffectsTrait
{
    /**
     * @var EffectType[]|null
     */
    public readonly ?array $effects;
    final protected function __effects(array $data): void
    {
        $this->effects = Helper::makeArrayOfObjects($data['effects'], EffectType::class);
    }
}
