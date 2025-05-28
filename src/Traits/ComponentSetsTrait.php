<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\ComponentSetType;

trait ComponentSetsTrait
{
    /**
     * @var ComponentSetType[]|null
     */
    public readonly ?array $componentSets;
    final protected function __componentSets(array $data): void
    {
        $componentSets = null;
        if (!empty($data['componentSets']) && is_array($data['componentSets'])) {
            $componentSets = [];
            foreach ($data['componentSets'] as $key => $componentSet) {
                $componentSets[$key] = new ComponentSetType($componentSet);
            }
        }
        $this->componentSets = $componentSets;
    }
}
