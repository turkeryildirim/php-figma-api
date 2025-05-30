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
use Turker\FigmaAPI\Util\Helper;

class TypeStyleType extends AbstractType
{
    use BoundVariablesTrait;
    use FillsTrait;

    public readonly ?string $fontFamily;
    public readonly ?string $fontPostScriptName;
    public readonly ?string $fontStyle;
    public readonly int|float|null $paragraphSpacing;
    public readonly int|float|null $paragraphIndent;
    public readonly int|float|null $listSpacing;
    public readonly ?bool $italic;
    public readonly int|float|null $fontWeight;
    public readonly int|float|null $fontSize;
    public readonly ?string $textCase;
    public readonly ?string $textDecoration;
    public readonly ?string $textAutoResize;
    public readonly ?string $textTruncation;
    public readonly int|float|null $maxLines;
    public readonly ?string $textAlignHorizontal;
    public readonly ?string $textAlignVertical;
    public readonly int|float|null $letterSpacing;
    public readonly ?string $hyperlink;
    /**
     * @var int[]|null
     */
    public readonly ?array $opentypeFlags;
    public readonly int|float|null $lineHeightPx;
    public readonly int|float|null $lineHeightPercent;
    public readonly int|float|null $lineHeightPercentFontSize;
    public readonly ?string $lineHeightUnit;
    public readonly ?bool $isOverrideOverTextStyle;
    public readonly ?string $semanticWeight;
    public readonly ?string $semanticItalic;


    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->fontFamily                = $data['fontFamily'];
        $this->fontWeight                = Helper::makeInteger($data['fontWeight']);
        $this->fontSize                  = Helper::makeInteger($data['fontSize']);
        $this->lineHeightPx              = Helper::makeInteger($data['lineHeightPx']);
        $this->fontPostScriptName        = $data['fontPostScriptName'] ?? null;
        $this->fontStyle                 = $data['fontStyle'] ?? null;
        $this->paragraphSpacing          = Helper::makeInteger($data['paragraphSpacing'], 0);
        $this->paragraphIndent           = Helper::makeInteger($data['paragraphIndent'], 0);
        $this->listSpacing               = Helper::makeInteger($data['listSpacing'], 0);
        $this->italic                    = Helper::makeBoolean($data['italic'], false);
        $this->maxLines                  = Helper::makeInteger($data['maxLines']);
        $this->letterSpacing             = Helper::makeInteger($data['letterSpacing']);
        $this->lineHeightPercent         = Helper::makeInteger($data['lineHeightPercent'], 100);
        $this->lineHeightPercentFontSize = Helper::makeInteger($data['lineHeightPercentFontSize']);
        $this->isOverrideOverTextStyle   = Helper::makeBoolean($data['isOverrideOverTextStyle'], false);


        $this->textCase = Helper::makeFromEnum(
            $data['textCase'],
            TextCaseEnum::class,
            TextCaseEnum::ORIGINAL->value
        );

        $this->textDecoration = Helper::makeFromEnum(
            $data['textDecoration'],
            TextDecorationEnum::class,
            TextDecorationEnum::NONE->value
        );

        $this->textAutoResize = Helper::makeFromEnum(
            $data['textAutoResize'],
            TextAutoResizeEnum::class,
            TextAutoResizeEnum::NONE->value
        );

        $this->textTruncation = Helper::makeFromEnum(
            $data['textTruncation'],
            TextTruncationEnum::class,
            TextTruncationEnum::DISABLED->value
        );

        $this->textAlignHorizontal = Helper::makeFromEnum(
            $data['textAlignHorizontal'],
            TextAlignHorizontalEnum::class
        );

        $this->textAlignVertical = Helper::makeFromEnum(
            $data['textAlignVertical'],
            TextAlignVerticalEnum::class
        );

        $this->hyperlink = Helper::makeFromEnum(
            $data['hyperlink'],
            HyperlinkTypeEnum::class
        );

        $this->lineHeightUnit = Helper::makeFromEnum(
            $data['lineHeightUnit'],
            LineHeightUnitEnum::class
        );

        $this->semanticWeight = Helper::makeFromEnum(
            $data['semanticWeight'],
            SemanticWeightEnum::class
        );

        $this->semanticItalic = Helper::makeFromEnum(
            $data['semanticItalic'],
            SemanticItalicEnum::class
        );

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
