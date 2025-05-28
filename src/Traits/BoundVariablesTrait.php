<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\VariableAliasType;

trait BoundVariablesTrait
{
    /**
     * @var VariableAliasType[]|null
     */
    public readonly ?array $boundVariables;
    final protected function __boundVariables(array $data): void
    {
        $boundVariables = null;
        if (!empty($data['boundVariables']) && is_array($data['boundVariables'])) {
            $boundVariables = [];
            foreach ($data['boundVariables'] as $value) {
                $boundVariables[] = new VariableAliasType($value);
            }
        }
        $this->boundVariables = $boundVariables;
    }
}
