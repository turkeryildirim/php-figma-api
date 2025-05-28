<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Endpoints;

use Turker\FigmaAPI\Endpoints\FilesEndpoint;
use Turker\FigmaAPI\Responses\Files\FileImagesResponse;
use Turker\FigmaAPI\Responses\Files\FileMetaResponse;
use Turker\FigmaAPI\Responses\Files\FileNodesResponse;
use Turker\FigmaAPI\Responses\Files\FilesResponse;
use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Test\ResponseMockData;
use Turker\FigmaAPI\Types\File\ComponentSetType;
use Turker\FigmaAPI\Types\File\ComponentType;
use Turker\FigmaAPI\Types\File\DocumentNodeType;
use Turker\FigmaAPI\Types\File\FileMetaType;
use Turker\FigmaAPI\Types\File\FileNodeType;
use Turker\FigmaAPI\Types\File\FileType;
use Turker\FigmaAPI\Types\User\UserType;

final class FilesTest extends AbstractBaseTestCase
{
    public function testFetchFileMeta(): void
    {
        $this->successResponse(ResponseMockData::FILE_META);
        $response = new FilesEndpoint($this->httpClient);
        $data = $response->fetchFileMetaData('fileKey');

        $this->assertInstanceOf(FilesEndpoint::class, $response);
        $this->assertInstanceOf(FileMetaResponse::class, $data);
        $this->assertInstanceOf(FileMetaType::class, $data->file);
        $this->assertInstanceOf(UserType::class, $data->file->creator);
        $this->assertInstanceOf(UserType::class, $data->file->lastTouchedBy);

        $this->assertEquals('name', $data->file->name);
        $this->assertEquals('thumbnail_url', $data->file->thumbnailUrl);
        $this->assertEquals('last_touched_at', $data->file->lastTouchedAt);
        $this->assertEquals('folder_name', $data->file->folderName);
        $this->assertEquals('url', $data->file->url);
        $this->assertEquals('link_access', $data->file->linkAccess);
        $this->assertEquals('role', $data->file->role);
        $this->assertEquals('version', $data->file->version);
    }
    public function testFetchFile(): void
    {
        $this->successResponse(ResponseMockData::FILE);
        $response = new FilesEndpoint($this->httpClient);
        $data = $response->fetchFile('fileKey');

        $this->assertInstanceOf(FilesEndpoint::class, $response);
        $this->assertInstanceOf(FilesResponse::class, $data);
        $this->assertInstanceOf(FileType::class, $data->file);
        $this->assertInstanceOf(DocumentNodeType::class, $data->file->document);
        $this->assertIsArray($data->file->components);
        $this->assertInstanceOf(ComponentType::class, $data->file->components[0]);
        $this->assertIsArray($data->file->componentSets);
        $this->assertInstanceOf(ComponentSetType::class, $data->file->componentSets[0]);

        $this->assertNull($data->file->branches);
        $this->assertEquals('name', $data->file->name);
        $this->assertEquals('thumbnail_url', $data->file->thumbnailUrl);
        $this->assertEquals('last_modified', $data->file->lastModified);
        $this->assertEquals('role', $data->file->role);
        $this->assertEquals('version', $data->file->version);
        $this->assertEquals('mainFileKey', $data->file->mainFileKey);

        $this->assertEquals('0:0', $data->file->document->id);
        $this->assertEquals('Document', $data->file->document->name);
        $this->assertEquals('DOCUMENT', $data->file->document->type);
        $this->assertEquals('SCROLLS', $data->file->document->scrollBehavior);
        $this->assertNull($data->file->document->children);

        $this->assertEquals('componentSetId', $data->file->components[0]->componentSetId);
        $this->assertEquals('key', $data->file->components[0]->key);
        $this->assertEquals('name', $data->file->components[0]->name);
        $this->assertEquals('description', $data->file->components[0]->description);
        $this->assertEquals('url', $data->file->components[0]->documentationLinks[0]);
        $this->assertFalse($data->file->components[0]->remote);

        $this->assertEquals('key', $data->file->componentSets[0]->key);
        $this->assertEquals('name', $data->file->componentSets[0]->name);
        $this->assertEquals('description', $data->file->componentSets[0]->description);
        $this->assertEquals('url', $data->file->componentSets[0]->documentationLinks[0]);
        $this->assertFalse($data->file->componentSets[0]->remote);

        $this->assertEquals('key', $data->file->styles[0]->key);
        $this->assertEquals('name', $data->file->styles[0]->name);
        $this->assertEquals('description', $data->file->styles[0]->description);
        $this->assertFalse($data->file->styles[0]->remote);
        $this->assertEquals('GRID', $data->file->styles[0]->styleType->value);
    }
    public function testFetchFileNodes(): void
    {
        $this->successResponse(ResponseMockData::FILE_NODES);
        $response = new FilesEndpoint($this->httpClient);
        $data = $response->fetchFileNodes('fileKey', '1,2,5');

        $this->assertInstanceOf(FilesEndpoint::class, $response);
        $this->assertInstanceOf(FileNodesResponse::class, $data);
        $this->assertIsArray($data->nodes);
        $this->assertInstanceOf(FileNodeType::class, $data->nodes[0]);
        $this->assertInstanceOf(DocumentNodeType::class, $data->nodes[0]->document);

        $this->assertInstanceOf(ComponentType::class, $data->nodes[0]->components['1105:2']);
        $this->assertIsArray($data->nodes[0]->componentSets);
        $this->assertInstanceOf(ComponentSetType::class, $data->nodes[0]->componentSets['1105:2']);

        $this->assertEquals('id', $data->nodes[0]->document->id);
        $this->assertEquals('name', $data->nodes[0]->document->name);
        $this->assertEquals('type', $data->nodes[0]->document->type);
        $this->assertEquals('scrollBehavior', $data->nodes[0]->document->scrollBehavior);
        $this->assertNull($data->nodes[0]->document->children);

        $this->assertEquals('componentSetId', $data->nodes[0]->components['1105:2']->componentSetId);
        $this->assertEquals('key', $data->nodes[0]->components['1105:2']->key);
        $this->assertEquals('name', $data->nodes[0]->components['1105:2']->name);
        $this->assertEquals('description', $data->nodes[0]->components['1105:2']->description);
        $this->assertEquals('url', $data->nodes[0]->components['1105:2']->documentationLinks[0]);
        $this->assertFalse($data->nodes[0]->components['1105:2']->remote);

        $this->assertEquals('key', $data->nodes[0]->componentSets['1105:2']->key);
        $this->assertEquals('name', $data->nodes[0]->componentSets['1105:2']->name);
        $this->assertEquals('description', $data->nodes[0]->componentSets['1105:2']->description);
        $this->assertEquals('url', $data->nodes[0]->componentSets['1105:2']->documentationLinks[0]);
        $this->assertFalse($data->nodes[0]->componentSets['1105:2']->remote);

        $this->assertEquals('key', $data->nodes[0]->styles[0]->key);
        $this->assertEquals('name', $data->nodes[0]->styles[0]->name);
        $this->assertEquals('description', $data->nodes[0]->styles[0]->description);
        $this->assertFalse($data->nodes[0]->styles[0]->remote);
        $this->assertEquals('GRID', $data->nodes[0]->styles[0]->styleType->value);
    }
    public function testFetchImages(): void
    {
        $this->successResponse(ResponseMockData::FILE_IMAGES);
        $response = new FilesEndpoint($this->httpClient);
        $data = $response->fetchImages('fileKey', '1,2,5');

        $this->assertInstanceOf(FilesEndpoint::class, $response);
        $this->assertInstanceOf(FileImagesResponse::class, $data);
        $this->assertIsArray($data->images);
        $this->assertCount(2, $data->images);


        $this->assertEquals('image_url1', $data->images[0]['node_id1']);
    }
    public function testFetchImageFills(): void
    {
        $this->successResponse(ResponseMockData::FILE_IMAGE_FILLS);
        $response = new FilesEndpoint($this->httpClient);
        $data = $response->fetchImageFills('fileKey');

        $this->assertInstanceOf(FilesEndpoint::class, $response);
        $this->assertInstanceOf(FileImagesResponse::class, $data);
        $this->assertIsArray($data->images);
        $this->assertCount(2, $data->images);


        $this->assertEquals('image_url1', $data->images[0]['node_id1']);
    }
}
