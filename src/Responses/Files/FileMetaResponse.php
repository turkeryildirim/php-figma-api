<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Files;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\File\FileMetaType;

final class FileMetaResponse extends BaseResponse
{
    public readonly FileMetaType $file;
    public function __construct(?array $data)
    {
        $this->file = new FileMetaType($data['file']);
    }
}
