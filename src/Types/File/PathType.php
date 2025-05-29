<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class PathType extends AbstractType
{
    public readonly string $path;
    public readonly ?string $windingRule;
    public readonly int|float|null $overrideID;

    public function __construct(array $data)
    {
        $this->path        = $data['path'];
        $this->windingRule = $data['windingRule'] ?? null;
        $this->overrideID  = Helper::makeInteger($data['overrideID']);
    }
}
