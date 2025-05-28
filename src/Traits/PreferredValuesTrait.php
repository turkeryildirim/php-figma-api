<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\InstanceSwapPreferredValueType;

trait PreferredValuesTrait
{
    /**
     * @var InstanceSwapPreferredValueType[]|null
     */
    public readonly ?array $preferredValues;
    final protected function __preferredValues(array $data): void
    {
        $preferredValues = null;
        if (!empty($data['preferredValues']) && is_array($data['preferredValues'])) {
            $preferredValues = [];
            foreach ($data['preferredValues'] as $preferredValue) {
                $preferredValues[] = new InstanceSwapPreferredValueType($preferredValue);
            }
        }
        $this->preferredValues = $preferredValues;
    }
}
