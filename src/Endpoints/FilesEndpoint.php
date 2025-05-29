<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Endpoints;

use Turker\FigmaAPI\Responses\Files\FileImagesResponse;
use Turker\FigmaAPI\Responses\Files\FileMetaResponse;
use Turker\FigmaAPI\Responses\Files\FileNodesResponse;
use Turker\FigmaAPI\Responses\Files\FilesResponse;

/**
 * https://www.figma.com/developers/api#get-files-endpoint
 * https://www.figma.com/developers/api#get-file-nodes-endpoint
 * https://www.figma.com/developers/api#get-images-endpoint
 * https://www.figma.com/developers/api#get-image-fills-endpoint
 */
final class FilesEndpoint extends BaseEndpoint
{
    public function fetchFileMetaData(string $key): FileMetaResponse
    {
        $data = $this->client->get('files/' . $key . '/meta');
        return FileMetaResponse::build($data);
    }
    public function fetchFile(
        string $key,
        ?string $ids = null,
        ?string $depth = null,
        ?string $version = null,
        ?string $geometry = null,
        ?string $pluginData = null,
        bool $branchData = false,
    ): FilesResponse {
        $params = [
            'ids' => $ids,
            'depth' => $depth,
            'version' => $version,
            'geometry' => $geometry,
            'plugin_data' => $pluginData,
            'branch_data' => $branchData,
        ];
        $data   = $this->client->get('files/' . $key, $params);
        return FilesResponse::build($data);
    }
    public function fetchFileNodes(
        string $key,
        string $ids,
        ?string $depth = null,
        ?string $version = null,
        ?string $geometry = null,
        ?string $pluginData = null
    ): FileNodesResponse {
        $params = [
            'ids' => $ids,
            'depth' => $depth,
            'version' => $version,
            'geometry' => $geometry,
            'plugin_data' => $pluginData
        ];
        $data   = $this->client->get('files/' . $key . '/nodes', $params);
        return FileNodesResponse::build($data);
    }
    public function fetchImages(
        string $key,
        string $ids,
        ?string $scale = null,
        ?string $format = null,
        ?string $version = null,
        bool $useAbsoluteBounds = false,
    ): FileImagesResponse {
        $params = [
            'ids' => $ids,
            'scale' => $scale,
            'format' => $format,
            'use_absolute_bounds' => $useAbsoluteBounds,
            'version' => $version
        ];
        $data   = $this->client->get('images/' . $key, $params);
        return FileImagesResponse::build($data['images']);
    }
    public function fetchImageFills(string $key): FileImagesResponse
    {
        $data = $this->client->get('files/' . $key . '/images');
        return FileImagesResponse::build($data['meta']['images']);
    }
}
