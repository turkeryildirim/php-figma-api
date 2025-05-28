<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\PaintType;

trait StrokesTrait
{
    /**
     * @var PaintType[]|null
     */
    public readonly ?array $strokes;
    final protected function __strokes(array $data): void
    {
        $strokes = null;
        if (!empty($data['strokes']) && is_array($data['strokes'])) {
            $strokes = [];
            foreach ($data['strokes'] as $stroke) {
                $strokes[] = new PaintType($stroke);
            }
        }
        $this->strokes = $strokes;
    }
}
