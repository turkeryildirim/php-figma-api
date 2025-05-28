<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\PaintType;

trait FillsTrait
{
    /**
     * @var PaintType[]|null
     */
    public readonly ?array $fills;
    final protected function __fills(array $data): void
    {
        $fills = null;
        if (!empty($data['fills']) && is_array($data['fills'])) {
            $fills = [];
            foreach ($data['fills'] as $fill) {
                $fills[] = new PaintType($fill);
            }
        }
        $this->fills = $fills;
    }
}
