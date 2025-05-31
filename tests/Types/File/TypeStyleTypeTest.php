<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\TypeStyleType;
use TypeError;

final class TypeStyleTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new TypeStyleType([
            'fontFamily' => 'fontFamily',
            'fontWeight' => 10,
            'fontSize' => 10,
            'fontPostScriptName' => 'fontPostScriptName',
            'fontStyle' => 'fontStyle',
            'paragraphSpacing' => 10,
            'paragraphIndent' => 10,
            'listSpacing' => 10,
            'italic' => true,
            'maxLines' => 10,
            'letterSpacing' => 10,
            'lineHeightPx' => 10,
            'lineHeightPercent' => 10,
            'lineHeightPercentFontSize' => 10,
            'isOverrideOverTextStyle' => true,
            'textCase' => 'LOWER',
            'textDecoration' => 'STRIKETHROUGH',
            'textAutoResize' => 'WIDTH_AND_HEIGHT',
            'textTruncation' => 'DISABLED',
            'textAlignHorizontal' => 'JUSTIFIED',
            'textAlignVertical' => 'BOTTOM',
            'hyperlink' => 'NODE',
            'lineHeightUnit' => 'PIXELS',
            'semanticWeight' => 'NORMAL',
            'semanticItalic' => 'ITALIC',
            'opentypeFlags' => ['k1' => 'v1', 'k2' => 'v2'],
            'boundVariables' => [['id' => 'id', 'type' => 'type']],
            'fills' => [[
                'visible' => false,
                'color' => ['r' => 15, 'g' => 25, 'b' => 35, 'a' => 45],
                'blendMode' => 'MULTIPLY',
                'opacity' => 7,
                'boundVariables' => [['id' => 'id', 'type' => 'type']],
                'type' => 'GRADIENT_LINEAR',
                'gradientHandlePositions' => [['x' => 4, 'y' => 3]],
                'gradientStops' => [[
                    'position' => 10,
                    'color' => ['r' => 1, 'g' => 2, 'b' => 3, 'a' => 4],
                    'boundVariables' => [['id' => 'id', 'type' => 'type']]
                ]],
                'scaleMode' => 'TILE',
                'imageTransform' => '9,8,7,6,5,4,3,2,1',
                'scalingFactor' => 26,
                'rotation' => 19,
                'imageRef' => 'imageRef',
                'gifRef' => 'gifRef',
                'filters' => [[
                    'exposure' => 1,
                    'contrast' => 2,
                    'saturation' => 3,
                    'temperature' => 4,
                    'tint' => 5,
                    'highlights' => 6,
                    'shadows' => 7,
                ]],
            ]],
        ]);

        $this->assertTrue($class->italic);
        $this->assertTrue($class->isOverrideOverTextStyle);
        $this->assertEquals('v1', $class->opentypeFlags['k1']);
        $this->assertEquals('fontFamily', $class->fontFamily);
        $this->assertEquals('10', $class->fontWeight);
        $this->assertEquals('10', $class->fontSize);
        $this->assertEquals('10', $class->lineHeightPx);
        $this->assertEquals('fontPostScriptName', $class->fontPostScriptName);
        $this->assertEquals('fontStyle', $class->fontStyle);
        $this->assertEquals('10', $class->paragraphSpacing);
        $this->assertEquals('10', $class->paragraphIndent);
        $this->assertEquals('10', $class->listSpacing);
        $this->assertEquals('10', $class->maxLines);
        $this->assertEquals('10', $class->letterSpacing);
        $this->assertEquals('10', $class->lineHeightPercent);
        $this->assertEquals('10', $class->lineHeightPercentFontSize);
        $this->assertEquals('LOWER', $class->textCase);
        $this->assertEquals('STRIKETHROUGH', $class->textDecoration);
        $this->assertEquals('WIDTH_AND_HEIGHT', $class->textAutoResize);
        $this->assertEquals('DISABLED', $class->textTruncation);
        $this->assertEquals('JUSTIFIED', $class->textAlignHorizontal);
        $this->assertEquals('BOTTOM', $class->textAlignVertical);
        $this->assertEquals('NODE', $class->hyperlink);
        $this->assertEquals('PIXELS', $class->lineHeightUnit);
        $this->assertEquals('NORMAL', $class->semanticWeight);
        $this->assertEquals('ITALIC', $class->semanticItalic);
        $this->assertEquals('type', $class->boundVariables[0]->type);
        $this->assertEquals('id', $class->boundVariables[0]->id);
        $this->assertFalse($class->fills[0]->visible);
        $this->assertEquals('15', $class->fills[0]->color->r);
        $this->assertEquals('25', $class->fills[0]->color->g);
        $this->assertEquals('35', $class->fills[0]->color->b);
        $this->assertEquals('45', $class->fills[0]->color->a);
        $this->assertEquals('MULTIPLY', $class->fills[0]->blendMode);
        $this->assertEquals('id', $class->fills[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->fills[0]->boundVariables[0]->type);
        $this->assertEquals('GRADIENT_LINEAR', $class->fills[0]->type);
        $this->assertEquals('4', $class->fills[0]->gradientHandlePositions[0]->x);
        $this->assertEquals('3', $class->fills[0]->gradientHandlePositions[0]->y);
        $this->assertEquals('10', $class->fills[0]->gradientStops[0]->position);
        $this->assertEquals('1', $class->fills[0]->gradientStops[0]->color->r);
        $this->assertEquals('2', $class->fills[0]->gradientStops[0]->color->g);
        $this->assertEquals('3', $class->fills[0]->gradientStops[0]->color->b);
        $this->assertEquals('4', $class->fills[0]->gradientStops[0]->color->a);
        $this->assertEquals('id', $class->fills[0]->gradientStops[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->fills[0]->gradientStops[0]->boundVariables[0]->type);
        $this->assertEquals('TILE', $class->fills[0]->scaleMode);
        $this->assertEquals('9', $class->fills[0]->imageTransform[0][0]);
        $this->assertEquals('26', $class->fills[0]->scalingFactor);
        $this->assertEquals('19', $class->fills[0]->rotation);
        $this->assertEquals('imageRef', $class->fills[0]->imageRef);
        $this->assertEquals('gifRef', $class->fills[0]->gifRef);
        $this->assertEquals('1', $class->fills[0]->filters[0]->exposure);
        $this->assertEquals('2', $class->fills[0]->filters[0]->contrast);
        $this->assertEquals('3', $class->fills[0]->filters[0]->saturation);
        $this->assertEquals('4', $class->fills[0]->filters[0]->temperature);
        $this->assertEquals('5', $class->fills[0]->filters[0]->tint);
        $this->assertEquals('6', $class->fills[0]->filters[0]->highlights);
        $this->assertEquals('7', $class->fills[0]->filters[0]->shadows);
    }
    public function testWithMinData(): void
    {
        $class = new TypeStyleType([
            'fontFamily' => 'fontFamily',
            'fontWeight' => 10,
            'fontSize' => 10,
            'lineHeightPx' => 10
        ]);
        $this->assertEquals('fontFamily', $class->fontFamily);
        $this->assertEquals('10', $class->fontWeight);
        $this->assertEquals('10', $class->fontSize);
        $this->assertEquals('10', $class->lineHeightPx);
        $this->assertEquals('0', $class->paragraphSpacing);
        $this->assertEquals('0', $class->paragraphIndent);
        $this->assertEquals('0', $class->listSpacing);
        $this->assertEquals('100', $class->lineHeightPercent);

        $this->assertFalse($class->italic);
        $this->assertFalse($class->isOverrideOverTextStyle);
        $this->assertNull($class->opentypeFlags);
        $this->assertNull($class->fontPostScriptName);
        $this->assertNull($class->fontStyle);
        $this->assertNull($class->maxLines);
        $this->assertNull($class->letterSpacing);
        $this->assertNull($class->lineHeightPercentFontSize);
        $this->assertNull($class->textAlignHorizontal);
        $this->assertNull($class->textAlignVertical);
        $this->assertNull($class->lineHeightUnit);
        $this->assertNull($class->hyperlink);
        $this->assertNull($class->semanticWeight);
        $this->assertNull($class->semanticItalic);
        $this->assertNull($class->boundVariables);
        $this->assertNull($class->fills);
        $this->assertEquals('ORIGINAL', $class->textCase);
        $this->assertEquals('NONE', $class->textDecoration);
        $this->assertEquals('NONE', $class->textAutoResize);
        $this->assertEquals('DISABLED', $class->textTruncation);
    }
    public function testInvalidFontFamily(): void
    {
        $this->expectException(TypeError::class);
         new TypeStyleType([
             'fontFamily' => 10,
             'fontWeight' => 10,
             'fontSize' => 10,
             'lineHeightPx' => 10
         ]);
    }
    public function testInvalidFontWeight(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'fontWeight' => 'a',
            'fontSize' => 10,
            'lineHeightPx' => 10
        ]);
    }
    public function testInvalidFontSize(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'fontSize' => 'a',
            'fontWeight' => 10,
            'lineHeightPx' => 10
        ]);
    }
    public function testInvalidLineHeightPx(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'lineHeightPx' => 'a',
            'fontWeight' => 10,
            'fontSize' => 10
        ]);
    }
    public function testInvalidFontPostScriptName(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'fontPostScriptName' => 10,
        ]);
    }
    public function testInvalidFontStyle(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'fontStyle' => 10,
        ]);
    }
    public function testInvalidParagraphSpacing(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'paragraphSpacing' => 'a',
        ]);
    }
    public function testInvalidParagraphIndent(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'paragraphIndent' => 'a',
            'fontWeight' => 10,
            'fontSize' => 10,
            'lineHeightPx' => 10,
        ]);
    }
    public function testInvalidListSpacing(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'listSpacing' => 'a',
        ]);
    }
    public function testInvalidItalic(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'italic' => 'a',
        ]);
    }
    public function testInvalidMaxLines(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'maxLines' => 'a',
        ]);
    }
    public function testInvalidLetterSpacing(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'letterSpacing' => 'a',
        ]);
    }
    public function testInvalidLineHeightPercent(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'lineHeightPercent' => 'a',
        ]);
    }
    public function testInvalidLineHeightPercentFontSize(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'lineHeightPercentFontSize' => 'a',
        ]);
    }
    public function testInvalidIsOverrideOverTextStyle(): void
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 10,
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'isOverrideOverTextStyle' => 'a',
        ]);
    }
    public function testInvalidTextCase()
    {
        $this->expectException(TypeError::class);
        new TypeStyleType([
            'fontFamily' => 'fontFamily',
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'textCase' => 10,
        ]);
    }
    public function testInvalidTextAutoResize()
    {
        $class = new TypeStyleType([
            'fontFamily' => 'fontFamily',
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'textAutoResize' => 'a',
        ]);
        $this->assertEquals('NONE', $class->textAutoResize);
    }
    public function testInvalidTextTruncation()
    {
        $class = new TypeStyleType([
            'fontFamily' => 'fontFamily',
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'textTruncation' => 'a',
        ]);
        $this->assertEquals('DISABLED', $class->textTruncation);
    }
    public function testInvalidTextAlignHorizontal()
    {
        $class = new TypeStyleType([
            'fontFamily' => 'fontFamily',
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'textAlignHorizontal' => 'a',
        ]);
        $this->assertNull($class->textAlignHorizontal);
    }
    public function testInvalidTextAlignVertical()
    {
        $class = new TypeStyleType([
            'fontFamily' => 'fontFamily',
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'textAlignVertical' => 'a',
        ]);
        $this->assertNull($class->textAlignVertical);
    }
    public function testInvalidHyperlink()
    {
        $class = new TypeStyleType([
            'fontFamily' => 'fontFamily',
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'hyperlink' => 'a',
        ]);
        $this->assertNull($class->hyperlink);
    }
    public function testInvalidLineHeightUnit()
    {
        $class = new TypeStyleType([
            'fontFamily' => 'fontFamily',
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'lineHeightUnit' => 'a',
        ]);
        $this->assertNull($class->lineHeightUnit);
    }
    public function testInvalidSemanticWeight()
    {
        $class = new TypeStyleType([
            'fontFamily' => 'fontFamily',
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'semanticWeight' => 'a',
        ]);
        $this->assertNull($class->semanticWeight);
    }
    public function testInvalidSemanticItalic()
    {
        $class = new TypeStyleType([
            'fontFamily' => 'fontFamily',
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'semanticItalic' => 'a',
        ]);
        $this->assertNull($class->semanticItalic);
    }
    public function testInvalidOpentypeFlags()
    {
        $class = new TypeStyleType([
            'fontFamily' => 'fontFamily',
            'lineHeightPx' => 10,
            'fontWeight' => 10,
            'fontSize' => 10,
            'opentypeFlags' => 'a',
        ]);
        $this->assertNull($class->opentypeFlags);
    }
}
