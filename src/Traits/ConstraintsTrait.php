<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\LayoutConstraintType;

trait ConstraintsTrait
{
    public readonly ?LayoutConstraintType $constraints;
    final protected function __constraints(array $data): void
    {
        $this->constraints = !empty($data['constraints']) ? new LayoutConstraintType($data['constraints']) : null;
    }
}
