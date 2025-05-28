<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\StyleType;

trait StylesTrait
{
    /**
     * @var StyleType[]|null
     */
    public readonly ?array $styles;
    final protected function __styles(array $data): void
    {
        $styles = null;
        if (!empty($data['styles']) && is_array($data['styles'])) {
            $styles = [];
            foreach ($data['styles'] as $style) {
                $styles[] = new StyleType($style);
            }
        }
        $this->styles = $styles;
    }
}
