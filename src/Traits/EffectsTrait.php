<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\EffectType;

trait EffectsTrait
{
    /**
     * @var EffectType[]|null
     */
    public readonly ?array $effects;
    final protected function __effects(array $data): void
    {
        $effects = null;
        if (!empty($data['effects']) && is_array($data['effects'])) {
            $effects = [];
            foreach ($data['effects'] as $effect) {
                $effects[] = new EffectType($effect);
            }
        }
        $this->effects = $effects;
    }
}
