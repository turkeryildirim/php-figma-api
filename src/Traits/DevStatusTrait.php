<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\DevStatusType;

trait DevStatusTrait
{
    public readonly ?DevStatusType $devStatus;
    final protected function __devStatus(array $data): void
    {
        $this->devStatus = !empty($data['devStatus']) ? new DevStatusType($data['devStatus']) : null;
    }
}
