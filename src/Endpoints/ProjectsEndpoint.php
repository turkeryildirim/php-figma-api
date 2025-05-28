<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Endpoints;

use Turker\FigmaAPI\Responses\Projects\ProjectFilesResponse;
use Turker\FigmaAPI\Responses\Projects\ProjectsResponse;

/**
 * https://www.figma.com/developers/api#projects
 */
final class ProjectsEndpoint extends BaseEndpoint
{
    /**
     * It is not possible to programmatically obtain team IDs.
     * To obtain a team ID, navigate to the team page in the Figma file browser.
     * The team ID is present in the URL after the word team and before your team name.
     */
    public function fetchProjects(string $teamId): ProjectsResponse
    {
        $data = $this->client->get('teams/' . $teamId . '/projects');
        return ProjectsResponse::build($data);
    }
    public function fetchFiles(string $projectId, bool $branchData = false): ProjectFilesResponse
    {
        $data = $this->client->get('projects/' . $projectId . '/files', ['branch_data' => $branchData]);
        return ProjectFilesResponse::build($data);
    }
}
