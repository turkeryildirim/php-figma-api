<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\ComponentType;
use Turker\FigmaAPI\Util\Helper;

trait ComponentsTrait
{
    /**
     * @var ComponentType[]|null
     */
    public readonly ?array $components;
    final protected function __components(array $data): void
    {
        $this->components = Helper::makeArrayOfObjects($data['components'], ComponentType::class, true);
    }
}
