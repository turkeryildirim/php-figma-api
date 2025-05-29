<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Projects;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Project\ProjectFileType;

final class ProjectFilesResponse extends BaseResponse
{
    public readonly string $name;
    /**
     * @var ProjectFileType[]|null
     */
    public readonly ?array $files;

    public function __construct(array $data)
    {
        $this->name = $data['name'];

        $files = null;
        if (!empty($data['files'])) {
            $files = [];
            foreach ($data['files'] as $file) {
                $files[] = new ProjectFileType($file);
            }
        }
        $this->files = $files;
        return $this;
    }
}
