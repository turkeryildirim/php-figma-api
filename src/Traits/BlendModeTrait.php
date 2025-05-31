<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\File\BlendModeEnum;
use Turker\FigmaAPI\Util\Helper;

trait BlendModeTrait
{
    public readonly ?string $blendMode;
    final protected function __blendMode(array $data): void
    {
        $this->blendMode = Helper::makeFromEnum($data['blendMode'], BlendModeEnum::class);
    }
}
