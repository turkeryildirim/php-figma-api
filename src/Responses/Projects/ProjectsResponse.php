<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Projects;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Project\ProjectType;

final class ProjectsResponse extends BaseResponse
{
    public readonly string $name;
    /**
     * @var ProjectType[]|null
     */
    public readonly ?array $projects;

    public function __construct(array $data)
    {
        $this->name = $data['name'];

        $projects = null;
        if (!empty($data['projects'])) {
            $projects = [];
            foreach ($data['projects'] as $project) {
                $projects[] = new ProjectType($project);
            }
        }
        $this->projects = $projects;
        return $this;
    }
}
