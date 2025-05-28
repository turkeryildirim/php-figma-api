<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Endpoints;

use Turker\FigmaAPI\Responses\ComponentSets\ComponentSetResponse;
use Turker\FigmaAPI\Responses\ComponentSets\FileComponentSetsResponse;
use Turker\FigmaAPI\Responses\ComponentSets\TeamComponentSetsResponse;

/**
 * https://www.figma.com/developers/api#get-team-component-sets-endpoint
 * https://www.figma.com/developers/api#get-file-component-sets-endpoint
 * https://www.figma.com/developers/api#get-component-sets-endpoint
 */
final class ComponentSetsEndpoint extends BaseEndpoint
{
    /**
     *  It is not possible to programmatically obtain team IDs.
     *  To obtain a team ID, navigate to the team page in the Figma file browser.
     *  The team ID is present in the URL after the word team and before your team name.
     */
    public function fetchTeamComponentSets(
        string $teamId,
        ?string $before = null,
        ?string $after = null,
        int $pageSize = 30
    ): TeamComponentSetsResponse {
        $params = [
            'page_size' => $pageSize,
            'before' => $before,
            'after' => $after
        ];
        $data = $this->client->get('teams/' . $teamId . '/component_sets', $params);
        return TeamComponentSetsResponse::build($data);
    }
    public function fetchFileComponentSets(string $filekey): FileComponentSetsResponse
    {
        $data = $this->client->get('files/' . $filekey . '/component_sets');
        return FileComponentSetsResponse::build($data);
    }
    public function fetchComponentSet(string $key): ComponentSetResponse
    {
        $data = $this->client->get('component_sets/' . $key);
        return ComponentSetResponse::build($data);
    }
}
