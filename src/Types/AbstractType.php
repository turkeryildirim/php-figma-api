<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types;

use ReflectionClass;

abstract class AbstractType
{
    abstract public function __construct(array $data);

    final protected function runTraitMethods(array $data): void
    {
        $rc           = new ReflectionClass($this);
        $traits       = $rc->getTraits();
        $parentClass  = $rc->getParentClass();
        $parentTraits = (false !== $parentClass) ? $parentClass->getTraits() : [];
        $allTraits    = array_merge($traits, $parentTraits);
        if (empty($allTraits)) {
            return;
        }
        foreach ($allTraits as $trait) {
            $methods = $trait->getMethods();
            if (empty($methods)) {
                continue;
            }

            foreach ($methods as $method) {
                $methodName = $method->name;
                if (!is_callable([$this, $methodName])) {
                    continue;
                }
                $this->$methodName($data);
            }
        }
    }
}
