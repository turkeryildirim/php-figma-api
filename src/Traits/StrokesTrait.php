<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\PaintType;
use Turker\FigmaAPI\Util\Helper;

trait StrokesTrait
{
    /**
     * @var PaintType[]|null
     */
    public readonly ?array $strokes;
    final protected function __strokes(array $data): void
    {
        $this->strokes = Helper::makeArrayOfObjects($data['strokes'], PaintType::class);
    }
}
