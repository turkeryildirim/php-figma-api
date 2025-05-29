<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum ShapeTypeEnum: string
{
    use EnumArrayTrait;

    case SQUARE              = 'SQUARE';
    case ELLIPSE             = 'ELLIPSE';
    case ROUNDED_RECTANGLE   = 'ROUNDED_RECTANGLE';
    case DIAMOND             = 'DIAMOND';
    case TRIANGLE_DOWN       = 'TRIANGLE_DOWN';
    case PARALLELOGRAM_RIGHT = 'PARALLELOGRAM_RIGHT';
    case PARALLELOGRAM_LEFT  = 'PARALLELOGRAM_LEFT';
    case ENG_DATABASE        = 'ENG_DATABASE';
    case ENG_QUEUE           = 'ENG_QUEUE';
    case ENG_FILE            = 'ENG_FILE';
    case ENG_FOLDER          = 'ENG_FOLDER';
    case TRAPEZOID           = 'TRAPEZOID';
    case PREDEFINED_PROCESS  = 'PREDEFINED_PROCESS';
    case SHIELD              = 'SHIELD';
    case DOCUMENT_SINGLE     = 'DOCUMENT_SINGLE';
    case DOCUMENT_MULTIPLE   = 'DOCUMENT_MULTIPLE';
    case MANUAL_INPUT        = 'MANUAL_INPUT';
    case HEXAGON             = 'HEXAGON';
    case CHEVRON             = 'CHEVRON';
    case PENTAGON            = 'PENTAGON';
    case OCTAGON             = 'OCTAGON';
    case STAR                = 'STAR';
    case PLUS                = 'PLUS';
    case ARROW_LEFT          = 'ARROW_LEFT';
    case ARROW_RIGHT         = 'ARROW_RIGHT';
    case SUMMING_JUNCTION    = 'SUMMING_JUNCTION';
    case OR                  = 'OR';
    case SPEECH_BUBBLE       = 'SPEECH_BUBBLE';
    case INTERNAL_STORAGE    = 'INTERNAL_STORAGE';
}
