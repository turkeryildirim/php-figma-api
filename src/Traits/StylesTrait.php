<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\StyleType;
use Turker\FigmaAPI\Util\Helper;

trait StylesTrait
{
    /**
     * @var StyleType[]|null
     */
    public readonly ?array $styles;
    final protected function __styles(array $data): void
    {
        $this->styles = Helper::makeArray($data['styles'], StyleType::class);
    }
}
