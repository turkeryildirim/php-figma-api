<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\ComponentType;

trait ComponentsTrait
{
    /**
     * @var ComponentType[]|null
     */
    public readonly ?array $components;
    final protected function __components(array $data): void
    {
        $components = null;
        if (!empty($data['components']) && is_array($data['components'])) {
            $components = [];
            foreach ($data['components'] as $key => $component) {
                $components[$key] = new ComponentType($component);
            }
        }
        $this->components = $components;
    }
}
