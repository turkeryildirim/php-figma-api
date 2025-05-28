<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Endpoints;

use Turker\FigmaAPI\Responses\Components\ComponentResponse;
use Turker\FigmaAPI\Responses\Components\FileComponentsResponse;
use Turker\FigmaAPI\Responses\Components\TeamComponentsResponse;

/**
 * https://www.figma.com/developers/api#get-team-component-endpoint
 * https://www.figma.com/developers/api#get-file-component-endpoint
 * https://www.figma.com/developers/api#get-component-endpoint
 */
final class ComponentsEndpoint extends BaseEndpoint
{
    /**
     *  It is not possible to programmatically obtain team IDs.
     *  To obtain a team ID, navigate to the team page in the Figma file browser.
     *  The team ID is present in the URL after the word team and before your team name.
     */
    public function fetchTeamComponents(
        string $teamId,
        ?string $before = null,
        ?string $after = null,
        int $pageSize = 30
    ): TeamComponentsResponse {
        $params = [
            'page_size' => $pageSize,
            'before' => $before,
            'after' => $after
        ];
        $data = $this->client->get('teams/' . $teamId . '/components', $params);
        return TeamComponentsResponse::build($data);
    }
    public function fetchFileComponents(string $filekey): FileComponentsResponse
    {
        $data = $this->client->get('files/' . $filekey . '/components');
        return FileComponentsResponse::build($data);
    }
    public function fetchComponent(string $key): ComponentResponse
    {
        $data = $this->client->get('components/' . $key);
        return ComponentResponse::build($data);
    }
}
