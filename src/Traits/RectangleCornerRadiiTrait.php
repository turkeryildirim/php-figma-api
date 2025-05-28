<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait RectangleCornerRadiiTrait
{
    /**
     * @var int[]|float[]|null
     */
    public readonly ?array $rectangleCornerRadii;
    final protected function __rectangleCornerRadii(array $data): void
    {
        $rectangleCornerRadii = null;
        if (!empty($data['rectangleCornerRadii']) && is_array($data['rectangleCornerRadii'])) {
            $rectangleCornerRadii = [];
            foreach ($data['rectangleCornerRadii'] as $rcr) {
                $rectangleCornerRadii[] = $rcr;
            }
        }
        $this->rectangleCornerRadii = $rectangleCornerRadii;
    }
}
