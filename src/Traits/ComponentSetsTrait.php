<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\ComponentSetType;
use Turker\FigmaAPI\Util\Helper;

trait ComponentSetsTrait
{
    /**
     * @var ComponentSetType[]|null
     */
    public readonly ?array $componentSets;
    final protected function __componentSets(array $data): void
    {
        $this->componentSets = Helper::makeArrayOfObjects($data['componentSets'], ComponentSetType::class, true);
    }
}
