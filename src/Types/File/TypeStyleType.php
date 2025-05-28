<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\HyperlinkTypeEnum;
use Turker\FigmaAPI\Enums\File\LineHeightUnitEnum;
use Turker\FigmaAPI\Enums\File\SemanticItalicEnum;
use Turker\FigmaAPI\Enums\File\SemanticWeightEnum;
use Turker\FigmaAPI\Enums\File\TextAlignHorizontalEnum;
use Turker\FigmaAPI\Enums\File\TextAlignVerticalEnum;
use Turker\FigmaAPI\Enums\File\TextAutoResizeEnum;
use Turker\FigmaAPI\Enums\File\TextCaseEnum;
use Turker\FigmaAPI\Enums\File\TextDecorationEnum;
use Turker\FigmaAPI\Enums\File\TextTruncationEnum;
use Turker\FigmaAPI\Traits\BoundVariablesTrait;
use Turker\FigmaAPI\Traits\FillsTrait;
use Turker\FigmaAPI\Types\AbstractType;

class TypeStyleType extends AbstractType
{
    use BoundVariablesTrait;
    use FillsTrait;

    public readonly string $fontFamily;
    public readonly ?string $fontPostScriptName;
    public readonly ?string $fontStyle;
    public readonly int|float $paragraphSpacing;
    public readonly int|float $paragraphIndent;
    public readonly int|float $listSpacing;
    public readonly bool $italic;
    public readonly int|float $fontWeight;
    public readonly int|float $fontSize;
    public readonly TextCaseEnum $textCase;
    public readonly TextDecorationEnum $textDecoration;
    public readonly TextAutoResizeEnum $textAutoResize;
    public readonly TextTruncationEnum $textTruncation;
    public readonly int|float|null $maxLines;
    public readonly ?TextAlignHorizontalEnum $textAlignHorizontal;
    public readonly ?TextAlignVerticalEnum $textAlignVertical;
    public readonly int|float|null $letterSpacing;
    public readonly ?HyperlinkTypeEnum $hyperlink;
    /**
     * @var int[]|null
     */
    public readonly ?array $opentypeFlags;
    public readonly int|float $lineHeightPx;
    public readonly int|float $lineHeightPercent;
    public readonly int|float|null $lineHeightPercentFontSize;
    public readonly ?LineHeightUnitEnum $lineHeightUnit;
    public readonly bool $isOverrideOverTextStyle;
    public readonly ?SemanticWeightEnum $semanticWeight;
    public readonly ?SemanticItalicEnum $semanticItalic;


    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->fontFamily = $data['fontFamily'];
        $this->fontWeight = $data['fontWeight'];
        $this->fontSize = $data['fontSize'];
        $this->lineHeightPx = $data['lineHeightPx'];
        $this->fontPostScriptName = $data['fontPostScriptName'] ?? null;
        $this->fontStyle = $data['fontStyle'] ?? null;
        $this->paragraphSpacing = $data['paragraphSpacing'] ?? 0;
        $this->paragraphIndent = $data['paragraphIndent'] ?? 0;
        $this->listSpacing = $data['listSpacing'] ?? 0;
        $this->italic = $data['italic'] ?? false;
        $this->maxLines = $data['maxLines'] ?? null;
        $this->letterSpacing = $data['letterSpacing'] ?? null;
        $this->lineHeightPercent = $data['lineHeightPercent'] ?? 100;
        $this->lineHeightPercentFontSize = $data['lineHeightPercentFontSize'] ?? null;
        $this->isOverrideOverTextStyle = $data['isOverrideOverTextStyle'] ?? false;

        $this->textCase = ( !empty($data['textCase']) && TextCaseEnum::hasValue($data['textCase']) )
            ? TextCaseEnum::tryFrom($data['textCase']) : TextCaseEnum::ORIGINAL;

        $this->textDecoration = ( !empty($data['textDecoration']) && TextDecorationEnum::hasValue($data['textDecoration']) )
            ? TextDecorationEnum::tryFrom($data['textDecoration']) : TextDecorationEnum::NONE;

        $this->textAutoResize = ( !empty($data['textAutoResize']) && TextAutoResizeEnum::hasValue($data['textAutoResize']) )
            ? TextAutoResizeEnum::tryFrom($data['textAutoResize']) : TextAutoResizeEnum::NONE;

        $this->textTruncation = ( !empty($data['textTruncation']) && TextTruncationEnum::hasValue($data['textTruncation']) )
            ? TextTruncationEnum::tryFrom($data['textTruncation']) : TextTruncationEnum::DISABLED;

        $this->textAlignHorizontal = ( !empty($data['textAlignHorizontal']) && TextAlignHorizontalEnum::hasValue($data['textAlignHorizontal']) )
            ? TextAlignHorizontalEnum::tryFrom($data['textAlignHorizontal']) : null;

        $this->textAlignVertical = ( !empty($data['textAlignVertical']) && TextAlignVerticalEnum::hasValue($data['textAlignVertical']) )
            ? TextAlignVerticalEnum::tryFrom($data['textAlignVertical']) : null;

        $this->hyperlink = ( !empty($data['hyperlink']) && HyperlinkTypeEnum::hasValue($data['hyperlink']) )
            ? HyperlinkTypeEnum::tryFrom($data['hyperlink']) : null;

        $this->lineHeightUnit = ( !empty($data['lineHeightUnit']) && LineHeightUnitEnum::hasValue($data['lineHeightUnit']) )
            ? LineHeightUnitEnum::tryFrom($data['lineHeightUnit']) : null;

        $this->semanticWeight = ( !empty($data['semanticWeight']) && SemanticWeightEnum::hasValue($data['semanticWeight']) )
            ? SemanticWeightEnum::tryFrom($data['semanticWeight']) : null;

        $this->semanticItalic = ( !empty($data['semanticItalic']) && SemanticItalicEnum::hasValue($data['semanticItalic']) )
            ? SemanticItalicEnum::tryFrom($data['semanticItalic']) : null;

        $opentypeFlags = null;
        if (!empty($data['opentypeFlags']) && is_array($data['opentypeFlags'])) {
            $opentypeFlags = [];
            foreach ($data['opentypeFlags'] as $k => $v) {
                $opentypeFlags[$k] = $v;
            }
        }
        $this->opentypeFlags = $opentypeFlags;
    }
}
