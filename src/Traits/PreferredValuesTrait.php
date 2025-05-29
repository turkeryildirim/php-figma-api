<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\InstanceSwapPreferredValueType;
use Turker\FigmaAPI\Util\Helper;

trait PreferredValuesTrait
{
    /**
     * @var InstanceSwapPreferredValueType[]|null
     */
    public readonly ?array $preferredValues;
    final protected function __preferredValues(array $data): void
    {
        $this->preferredValues = Helper::makeArrayOfObjects($data['preferredValues'], InstanceSwapPreferredValueType::class);
    }
}
