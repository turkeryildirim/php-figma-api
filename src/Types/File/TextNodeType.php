<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\LineTypesEnum;
use Turker\FigmaAPI\Traits\CharactersTrait;

class TextNodeType extends VectorNodeType
{
    use CharactersTrait;

    public readonly TypeStyleType $style;
    public readonly ?array $characterStyleOverrides;
    public readonly ?array $styleOverrideTable;
    public readonly ?LineTypesEnum $lineTypes;
    public readonly ?array $lineIndentations;
    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->style                   = new TypeStyleType($data['style']);
        $this->characterStyleOverrides = $data['characterStyleOverrides'] ?? null;
        $this->lineIndentations        = $data['lineIndentations'] ?? null;

        $styleOverrideTable = null;
        if (!empty($data['styleOverrideTable']) && is_array($data['styleOverrideTable'])) {
            $styleOverrideTable = [];
            foreach ($data['styleOverrideTable'] as $k => $v) {
                $styleOverrideTable[$k] = new TypeStyleType($v);
            }
        }
        $this->styleOverrideTable = $styleOverrideTable;

        $this->lineTypes = ( !empty($data['lineTypes']) && LineTypesEnum::hasValue($data['lineTypes']) )
            ? LineTypesEnum::tryFrom($data['lineTypes']) : null;
    }
}
