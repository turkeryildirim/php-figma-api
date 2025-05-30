<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\TextNodeType;
use TypeError;

final class TextNodeTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new TextNodeType([
            'id' => 'id',
            'characters' => 'characters',
            'characterStyleOverrides' => ['a'],
            'lineIndentations' => ['a'],
            'styleOverrideTable' => [
                'key' => [
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
                ],
            ],
            'lineTypes' => 'UNORDERED',
            'style' => [
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
            ],
        ]);
        $this->assertEquals('characters', $class->characters);
        $this->assertEquals('a', $class->characterStyleOverrides[0]);
        $this->assertEquals('a', $class->lineIndentations[0]);
        $this->assertEquals('UNORDERED', $class->lineTypes);
        $this->assertTrue($class->style->italic);
        $this->assertTrue($class->style->isOverrideOverTextStyle);
        $this->assertEquals('v1', $class->style->opentypeFlags['k1']);
        $this->assertEquals('fontFamily', $class->style->fontFamily);
        $this->assertEquals('10', $class->style->fontWeight);
        $this->assertEquals('10', $class->style->fontSize);
        $this->assertEquals('10', $class->style->lineHeightPx);
        $this->assertEquals('fontPostScriptName', $class->style->fontPostScriptName);
        $this->assertEquals('fontStyle', $class->style->fontStyle);
        $this->assertEquals('10', $class->style->paragraphSpacing);
        $this->assertEquals('10', $class->style->paragraphIndent);
        $this->assertEquals('10', $class->style->listSpacing);
        $this->assertEquals('10', $class->style->maxLines);
        $this->assertEquals('10', $class->style->letterSpacing);
        $this->assertEquals('10', $class->style->lineHeightPercent);
        $this->assertEquals('10', $class->style->lineHeightPercentFontSize);
        $this->assertEquals('LOWER', $class->style->textCase);
        $this->assertEquals('STRIKETHROUGH', $class->style->textDecoration);
        $this->assertEquals('WIDTH_AND_HEIGHT', $class->style->textAutoResize);
        $this->assertEquals('DISABLED', $class->style->textTruncation);
        $this->assertEquals('JUSTIFIED', $class->style->textAlignHorizontal);
        $this->assertEquals('BOTTOM', $class->style->textAlignVertical);
        $this->assertEquals('NODE', $class->style->hyperlink);
        $this->assertEquals('PIXELS', $class->style->lineHeightUnit);
        $this->assertEquals('NORMAL', $class->style->semanticWeight);
        $this->assertEquals('type', $class->style->boundVariables[0]->type);
        $this->assertEquals('id', $class->style->boundVariables[0]->id);
        $this->assertFalse($class->style->fills[0]->visible);
        $this->assertEquals('15', $class->style->fills[0]->color->r);
        $this->assertEquals('25', $class->style->fills[0]->color->g);
        $this->assertEquals('35', $class->style->fills[0]->color->b);
        $this->assertEquals('45', $class->style->fills[0]->color->a);
        $this->assertEquals('MULTIPLY', $class->style->fills[0]->blendMode);
        $this->assertEquals('id', $class->style->fills[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->style->fills[0]->boundVariables[0]->type);
        $this->assertEquals('GRADIENT_LINEAR', $class->style->fills[0]->type);
        $this->assertEquals('4', $class->style->fills[0]->gradientHandlePositions[0]->x);
        $this->assertEquals('3', $class->style->fills[0]->gradientHandlePositions[0]->y);
        $this->assertEquals('10', $class->style->fills[0]->gradientStops[0]->position);
        $this->assertEquals('1', $class->style->fills[0]->gradientStops[0]->color->r);
        $this->assertEquals('2', $class->style->fills[0]->gradientStops[0]->color->g);
        $this->assertEquals('3', $class->style->fills[0]->gradientStops[0]->color->b);
        $this->assertEquals('4', $class->style->fills[0]->gradientStops[0]->color->a);
        $this->assertEquals('id', $class->style->fills[0]->gradientStops[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->style->fills[0]->gradientStops[0]->boundVariables[0]->type);
        $this->assertEquals('TILE', $class->style->fills[0]->scaleMode);
        $this->assertEquals('9', $class->style->fills[0]->imageTransform[0][0]);
        $this->assertEquals('26', $class->style->fills[0]->scalingFactor);
        $this->assertEquals('19', $class->style->fills[0]->rotation);
        $this->assertEquals('imageRef', $class->style->fills[0]->imageRef);
        $this->assertEquals('gifRef', $class->style->fills[0]->gifRef);
        $this->assertEquals('1', $class->style->fills[0]->filters[0]->exposure);
        $this->assertEquals('2', $class->style->fills[0]->filters[0]->contrast);
        $this->assertEquals('3', $class->style->fills[0]->filters[0]->saturation);
        $this->assertEquals('4', $class->style->fills[0]->filters[0]->temperature);
        $this->assertEquals('5', $class->style->fills[0]->filters[0]->tint);
        $this->assertEquals('6', $class->style->fills[0]->filters[0]->highlights);
        $this->assertEquals('7', $class->style->fills[0]->filters[0]->shadows);


        $this->assertTrue($class->styleOverrideTable['key']->italic);
        $this->assertTrue($class->styleOverrideTable['key']->isOverrideOverTextStyle);
        $this->assertEquals('v1', $class->styleOverrideTable['key']->opentypeFlags['k1']);
        $this->assertEquals('fontFamily', $class->styleOverrideTable['key']->fontFamily);
        $this->assertEquals('10', $class->styleOverrideTable['key']->fontWeight);
        $this->assertEquals('10', $class->styleOverrideTable['key']->fontSize);
        $this->assertEquals('10', $class->styleOverrideTable['key']->lineHeightPx);
        $this->assertEquals('fontPostScriptName', $class->styleOverrideTable['key']->fontPostScriptName);
        $this->assertEquals('fontStyle', $class->styleOverrideTable['key']->fontStyle);
        $this->assertEquals('10', $class->styleOverrideTable['key']->paragraphSpacing);
        $this->assertEquals('10', $class->styleOverrideTable['key']->paragraphIndent);
        $this->assertEquals('10', $class->styleOverrideTable['key']->listSpacing);
        $this->assertEquals('10', $class->styleOverrideTable['key']->maxLines);
        $this->assertEquals('10', $class->styleOverrideTable['key']->letterSpacing);
        $this->assertEquals('10', $class->styleOverrideTable['key']->lineHeightPercent);
        $this->assertEquals('10', $class->styleOverrideTable['key']->lineHeightPercentFontSize);
        $this->assertEquals('LOWER', $class->styleOverrideTable['key']->textCase);
        $this->assertEquals('STRIKETHROUGH', $class->styleOverrideTable['key']->textDecoration);
        $this->assertEquals('WIDTH_AND_HEIGHT', $class->styleOverrideTable['key']->textAutoResize);
        $this->assertEquals('DISABLED', $class->styleOverrideTable['key']->textTruncation);
        $this->assertEquals('JUSTIFIED', $class->styleOverrideTable['key']->textAlignHorizontal);
        $this->assertEquals('BOTTOM', $class->styleOverrideTable['key']->textAlignVertical);
        $this->assertEquals('NODE', $class->styleOverrideTable['key']->hyperlink);
        $this->assertEquals('PIXELS', $class->styleOverrideTable['key']->lineHeightUnit);
        $this->assertEquals('NORMAL', $class->styleOverrideTable['key']->semanticWeight);
        $this->assertEquals('type', $class->styleOverrideTable['key']->boundVariables[0]->type);
        $this->assertEquals('id', $class->styleOverrideTable['key']->boundVariables[0]->id);
        $this->assertFalse($class->styleOverrideTable['key']->fills[0]->visible);
        $this->assertEquals('15', $class->styleOverrideTable['key']->fills[0]->color->r);
        $this->assertEquals('25', $class->styleOverrideTable['key']->fills[0]->color->g);
        $this->assertEquals('35', $class->styleOverrideTable['key']->fills[0]->color->b);
        $this->assertEquals('45', $class->styleOverrideTable['key']->fills[0]->color->a);
        $this->assertEquals('MULTIPLY', $class->styleOverrideTable['key']->fills[0]->blendMode);
        $this->assertEquals('id', $class->styleOverrideTable['key']->fills[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->styleOverrideTable['key']->fills[0]->boundVariables[0]->type);
        $this->assertEquals('GRADIENT_LINEAR', $class->styleOverrideTable['key']->fills[0]->type);
        $this->assertEquals('4', $class->styleOverrideTable['key']->fills[0]->gradientHandlePositions[0]->x);
        $this->assertEquals('3', $class->styleOverrideTable['key']->fills[0]->gradientHandlePositions[0]->y);
        $this->assertEquals('10', $class->styleOverrideTable['key']->fills[0]->gradientStops[0]->position);
        $this->assertEquals('1', $class->styleOverrideTable['key']->fills[0]->gradientStops[0]->color->r);
        $this->assertEquals('2', $class->styleOverrideTable['key']->fills[0]->gradientStops[0]->color->g);
        $this->assertEquals('3', $class->styleOverrideTable['key']->fills[0]->gradientStops[0]->color->b);
        $this->assertEquals('4', $class->styleOverrideTable['key']->fills[0]->gradientStops[0]->color->a);
        $this->assertEquals('id', $class->styleOverrideTable['key']->fills[0]->gradientStops[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->styleOverrideTable['key']->fills[0]->gradientStops[0]->boundVariables[0]->type);
        $this->assertEquals('TILE', $class->styleOverrideTable['key']->fills[0]->scaleMode);
        $this->assertEquals('9', $class->styleOverrideTable['key']->fills[0]->imageTransform[0][0]);
        $this->assertEquals('26', $class->styleOverrideTable['key']->fills[0]->scalingFactor);
        $this->assertEquals('19', $class->styleOverrideTable['key']->fills[0]->rotation);
        $this->assertEquals('imageRef', $class->styleOverrideTable['key']->fills[0]->imageRef);
        $this->assertEquals('gifRef', $class->styleOverrideTable['key']->fills[0]->gifRef);
        $this->assertEquals('1', $class->styleOverrideTable['key']->fills[0]->filters[0]->exposure);
        $this->assertEquals('2', $class->styleOverrideTable['key']->fills[0]->filters[0]->contrast);
        $this->assertEquals('3', $class->styleOverrideTable['key']->fills[0]->filters[0]->saturation);
        $this->assertEquals('4', $class->styleOverrideTable['key']->fills[0]->filters[0]->temperature);
        $this->assertEquals('5', $class->styleOverrideTable['key']->fills[0]->filters[0]->tint);
        $this->assertEquals('6', $class->styleOverrideTable['key']->fills[0]->filters[0]->highlights);
        $this->assertEquals('7', $class->styleOverrideTable['key']->fills[0]->filters[0]->shadows);
    }
    public function testWithMinData(): void
    {
        $class = new TextNodeType([
            'id' => 'id',
            'characters' => 'characters',
            'style' => [
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
            ],
        ]);
        $this->assertEquals('characters', $class->characters);
        $this->assertNull($class->characterStyleOverrides);
        $this->assertNull($class->styleOverrideTable);
        $this->assertNull($class->lineTypes);
        $this->assertNull($class->lineIndentations);

        $this->assertTrue($class->style->italic);
        $this->assertTrue($class->style->isOverrideOverTextStyle);
        $this->assertEquals('v1', $class->style->opentypeFlags['k1']);
        $this->assertEquals('fontFamily', $class->style->fontFamily);
        $this->assertEquals('10', $class->style->fontWeight);
        $this->assertEquals('10', $class->style->fontSize);
        $this->assertEquals('10', $class->style->lineHeightPx);
        $this->assertEquals('fontPostScriptName', $class->style->fontPostScriptName);
        $this->assertEquals('fontStyle', $class->style->fontStyle);
        $this->assertEquals('10', $class->style->paragraphSpacing);
        $this->assertEquals('10', $class->style->paragraphIndent);
        $this->assertEquals('10', $class->style->listSpacing);
        $this->assertEquals('10', $class->style->maxLines);
        $this->assertEquals('10', $class->style->letterSpacing);
        $this->assertEquals('10', $class->style->lineHeightPercent);
        $this->assertEquals('10', $class->style->lineHeightPercentFontSize);
        $this->assertEquals('LOWER', $class->style->textCase);
        $this->assertEquals('STRIKETHROUGH', $class->style->textDecoration);
        $this->assertEquals('WIDTH_AND_HEIGHT', $class->style->textAutoResize);
        $this->assertEquals('DISABLED', $class->style->textTruncation);
        $this->assertEquals('JUSTIFIED', $class->style->textAlignHorizontal);
        $this->assertEquals('BOTTOM', $class->style->textAlignVertical);
        $this->assertEquals('NODE', $class->style->hyperlink);
        $this->assertEquals('PIXELS', $class->style->lineHeightUnit);
        $this->assertEquals('NORMAL', $class->style->semanticWeight);
        $this->assertEquals('type', $class->style->boundVariables[0]->type);
        $this->assertEquals('id', $class->style->boundVariables[0]->id);
        $this->assertFalse($class->style->fills[0]->visible);
        $this->assertEquals('15', $class->style->fills[0]->color->r);
        $this->assertEquals('25', $class->style->fills[0]->color->g);
        $this->assertEquals('35', $class->style->fills[0]->color->b);
        $this->assertEquals('45', $class->style->fills[0]->color->a);
        $this->assertEquals('MULTIPLY', $class->style->fills[0]->blendMode);
        $this->assertEquals('id', $class->style->fills[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->style->fills[0]->boundVariables[0]->type);
        $this->assertEquals('GRADIENT_LINEAR', $class->style->fills[0]->type);
        $this->assertEquals('4', $class->style->fills[0]->gradientHandlePositions[0]->x);
        $this->assertEquals('3', $class->style->fills[0]->gradientHandlePositions[0]->y);
        $this->assertEquals('10', $class->style->fills[0]->gradientStops[0]->position);
        $this->assertEquals('1', $class->style->fills[0]->gradientStops[0]->color->r);
        $this->assertEquals('2', $class->style->fills[0]->gradientStops[0]->color->g);
        $this->assertEquals('3', $class->style->fills[0]->gradientStops[0]->color->b);
        $this->assertEquals('4', $class->style->fills[0]->gradientStops[0]->color->a);
        $this->assertEquals('id', $class->style->fills[0]->gradientStops[0]->boundVariables[0]->id);
        $this->assertEquals('type', $class->style->fills[0]->gradientStops[0]->boundVariables[0]->type);
        $this->assertEquals('TILE', $class->style->fills[0]->scaleMode);
        $this->assertEquals('9', $class->style->fills[0]->imageTransform[0][0]);
        $this->assertEquals('26', $class->style->fills[0]->scalingFactor);
        $this->assertEquals('19', $class->style->fills[0]->rotation);
        $this->assertEquals('imageRef', $class->style->fills[0]->imageRef);
        $this->assertEquals('gifRef', $class->style->fills[0]->gifRef);
        $this->assertEquals('1', $class->style->fills[0]->filters[0]->exposure);
        $this->assertEquals('2', $class->style->fills[0]->filters[0]->contrast);
        $this->assertEquals('3', $class->style->fills[0]->filters[0]->saturation);
        $this->assertEquals('4', $class->style->fills[0]->filters[0]->temperature);
        $this->assertEquals('5', $class->style->fills[0]->filters[0]->tint);
        $this->assertEquals('6', $class->style->fills[0]->filters[0]->highlights);
        $this->assertEquals('7', $class->style->fills[0]->filters[0]->shadows);
    }
    public function testInvalidStyle(): void
    {
        $class = new TextNodeType([
            'id' => 'id',
            'characters' => 'characters',
            'style' => ['a'],
        ]);
        $this->assertNull($class->style->fontFamily);
    }
    public function testInvalidCharacterStyleOverrides(): void
    {
        $this->expectException(TypeError::class);
        new TextNodeType([
            'id' => 'id',
            'characters' => 'characters',
            'characterStyleOverrides' => 'a',
            'style' => [
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
            ],
        ]);
    }
    public function testInvalidLineIndentations(): void
    {
        $this->expectException(TypeError::class);
        new TextNodeType([
            'id' => 'id',
            'characters' => 'characters',
            'characterStyleOverrides' => 'a',
            'style' => [
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
            ],
        ]);
    }
    public function testInvalidStyleOverrideTable(): void
    {
        $this->expectException(TypeError::class);
        new TextNodeType([
            'id' => 'id',
            'characters' => 'characters',
            'characterStyleOverrides' => 'a',
            'style' => [
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
            ],
        ]);
    }
    public function testInvalidLineTypes(): void
    {
        $class = new TextNodeType([
            'id' => 'id',
            'characters' => 'characters',
            'lineTypes' => 'a',
            'style' => [
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
            ],
        ]);
        $this->assertNull($class->lineTypes);
    }
}
