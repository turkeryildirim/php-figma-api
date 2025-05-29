<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\VariableAliasType;
use Turker\FigmaAPI\Util\Helper;

trait BoundVariablesTrait
{
    /**
     * @var VariableAliasType[]|null
     */
    public readonly ?array $boundVariables;
    final protected function __boundVariables(array $data): void
    {
        $this->boundVariables = Helper::makeArrayOfObjects($data['boundVariables'], VariableAliasType::class);
    }
}
