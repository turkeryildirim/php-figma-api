<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\ColorType;
use Turker\FigmaAPI\Util\Helper;

trait BackgroundColorTrait
{
    public readonly ?ColorType $backgroundColor;
    final protected function __backgroundColor(array $data): void
    {
        $backgroundColor = $data['background_color'] ?? $data['backgroundColor'] ?? null;

        $this->backgroundColor = Helper::makeObject($backgroundColor, ColorType::class);
    }
}
