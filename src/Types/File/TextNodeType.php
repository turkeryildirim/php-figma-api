<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\LineTypesEnum;
use Turker\FigmaAPI\Traits\CharactersTrait;
use Turker\FigmaAPI\Util\Helper;

class TextNodeType extends VectorNodeType
{
    use CharactersTrait;

    public readonly ?TypeStyleType $style;
    public readonly ?array $characterStyleOverrides;
    public readonly ?array $styleOverrideTable;
    public readonly ?string $lineTypes;
    public readonly ?array $lineIndentations;
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->style                   = Helper::makeObject($data['style'], TypeStyleType::class);
        $this->characterStyleOverrides = $data['characterStyleOverrides'] ?? null;
        $this->lineIndentations        = $data['lineIndentations'] ?? null;

        $this->styleOverrideTable = Helper::makeArrayOfObjects($data['styleOverrideTable'], TypeStyleType::class, true);

        $this->lineTypes = Helper::makeFromEnum($data['lineTypes'], LineTypesEnum::class);
    }
}
