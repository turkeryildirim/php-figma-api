<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Util\Helper;

class EllipseNodeType extends VectorNodeType
{
    public readonly ArcDataType $arcData;
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->arcData = Helper::makeObject($data['arcData'], ArcDataType::class);
    }
}
