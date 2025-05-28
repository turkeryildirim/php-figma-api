<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\OperationTypeEnum;
use Turker\FigmaAPI\Traits\ChildrenTrait;

class BooleanOperationNodeType extends VectorNodeType
{
    use ChildrenTrait;

    public readonly OperationTypeEnum $booleanOperation;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->booleanOperation = OperationTypeEnum::tryFrom($data['booleanOperation']);
    }
}
