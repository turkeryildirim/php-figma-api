<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\PaintType;
use Turker\FigmaAPI\Util\Helper;

trait FillsTrait
{
    /**
     * @var PaintType[]|null
     */
    public readonly ?array $fills;
    final protected function __fills(array $data): void
    {
        $this->fills = Helper::makeArrayOfObjects($data['fills'], PaintType::class);
    }
}
