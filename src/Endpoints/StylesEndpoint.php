<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Endpoints;

use Turker\FigmaAPI\Responses\Styles\FileStylesResponse;
use Turker\FigmaAPI\Responses\Styles\StyleResponse;
use Turker\FigmaAPI\Responses\Styles\TeamStylesResponse;

/**
 * https://www.figma.com/developers/api#get-team-styles-endpoint
 * https://www.figma.com/developers/api#get-file-styles-endpoint
 * https://www.figma.com/developers/api#get-style-endpoint
 */
final class StylesEndpoint extends BaseEndpoint
{
    /**
     *  It is not possible to programmatically obtain team IDs.
     *  To obtain a team ID, navigate to the team page in the Figma file browser.
     *  The team ID is present in the URL after the word team and before your team name.
     */
    public function fetchTeamStyles(
        string $teamId,
        ?string $before = null,
        ?string $after = null,
        int $pageSize = 30
    ): TeamStylesResponse {
        $params = [
            'page_size' => $pageSize,
            'before' => $before,
            'after' => $after
        ];
        $data = $this->client->get('teams/' . $teamId . '/styles', $params);
        return TeamStylesResponse::build($data);
    }
    public function fetchFileStyles(string $filekey): FileStylesResponse
    {
        $data = $this->client->get('files/' . $filekey . '/styles');
        return FileStylesResponse::build($data);
    }
    public function fetchStyle(string $key): StyleResponse
    {
        $data = $this->client->get('styles/' . $key);
        return StyleResponse::build($data);
    }
}
