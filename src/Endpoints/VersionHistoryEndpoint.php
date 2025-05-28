<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Endpoints;

use Turker\FigmaAPI\Responses\VersionHistory\VersionHistoryResponse;

/**
 * https://www.figma.com/developers/api#version-history
 */
final class VersionHistoryEndpoint extends BaseEndpoint
{
    public function fetchAll(string $fileKey): VersionHistoryResponse
    {
        $data = $this->client->get('files/' . $fileKey . '/versions');
        return VersionHistoryResponse::build($data);
    }
}
