<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\OperationTypeEnum;
use Turker\FigmaAPI\Traits\ChildrenTrait;
use Turker\FigmaAPI\Util\Helper;

class BooleanOperationNodeType extends VectorNodeType
{
    use ChildrenTrait;

    public readonly ?string $booleanOperation;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->booleanOperation = Helper::makeFromEnum(
            $data['booleanOperation'],
            OperationTypeEnum::class
        );
    }
}
