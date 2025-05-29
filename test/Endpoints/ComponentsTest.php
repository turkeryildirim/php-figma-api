<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Endpoints;

use Turker\FigmaAPI\Endpoints\ComponentsEndpoint;
use Turker\FigmaAPI\Responses\Components\ComponentResponse;
use Turker\FigmaAPI\Responses\Components\FileComponentsResponse;
use Turker\FigmaAPI\Responses\Components\TeamComponentsResponse;
use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Test\ResponseMockData;
use Turker\FigmaAPI\Types\Common\CursorType;
use Turker\FigmaAPI\Types\Component\ComponentType;

final class ComponentsTest extends AbstractBaseTestCase
{
    public function testFetchTeamComponents(): void
    {
        $this->successResponse(ResponseMockData::TEAM_COMPONENT);
        $response = new ComponentsEndpoint($this->httpClient);
        $data     = $response->fetchTeamComponents('team_id');

        $this->assertInstanceOf(ComponentsEndpoint::class, $response);
        $this->assertInstanceOf(TeamComponentsResponse::class, $data);
        $this->assertEquals(200, $data->status);
        $this->assertFalse($data->error);

        $this->assertIsArray($data->meta['components']);
        $this->assertIsObject($data->meta['cursor']);

        $this->assertInstanceOf(CursorType::class, $data->meta['cursor']);
        $this->assertEquals(43410457.04840246, $data->meta['cursor']->before);
        $this->assertEquals(1752485.0628680736, $data->meta['cursor']->after);
        $this->assertInstanceOf(ComponentType::class, $data->meta['components'][0]);
        $this->runSharedTests($data->meta['components'][0]);
    }

    public function testFetchFileComponents(): void
    {
        $this->successResponse(ResponseMockData::FILE_COMPONENT);
        $response = new ComponentsEndpoint($this->httpClient);
        $data     = $response->fetchFileComponents('fileKey');

        $this->assertInstanceOf(ComponentsEndpoint::class, $response);
        $this->assertInstanceOf(FileComponentsResponse::class, $data);
        $this->assertEquals(200, $data->status);
        $this->assertFalse($data->error);

        $this->assertIsArray($data->meta['components']);
        $this->assertInstanceOf(ComponentType::class, $data->meta['components'][0]);
        $this->runSharedTests($data->meta['components'][0]);
    }

    public function testFetchComponent(): void
    {
        $this->successResponse(ResponseMockData::COMPONENT);
        $response = new ComponentsEndpoint($this->httpClient);
        $data     = $response->fetchComponent('key');

        $this->assertInstanceOf(ComponentsEndpoint::class, $response);
        $this->assertInstanceOf(ComponentResponse::class, $data);
        $this->assertInstanceOf(ComponentType::class, $data->meta);
        $this->assertEquals(200, $data->status);
        $this->assertFalse($data->error);
        $this->runSharedTests($data->meta);
    }

    private function runSharedTests($data): void
    {
        $this->assertEquals('key', $data->key);
        $this->assertEquals('file_key', $data->filekey);
        $this->assertEquals('node_id', $data->nodeId);
        $this->assertEquals('name', $data->name);
        $this->assertEquals('description', $data->description);
        $this->assertEquals('created_at', $data->createdAt);
        $this->assertEquals('updated_at', $data->updatedAt);

        $this->assertNull($data->user->email);
        $this->assertEquals('id', $data->user->id);
        $this->assertEquals('handle', $data->user->handle);
        $this->assertEquals('img_url', $data->user->imgUrl);
        $this->assertEquals('thumbnail_url', $data->thumbnailUrl);
        $this->assertEquals('pageId', $data->containingFrame->pageId);
        $this->assertEquals('pageName', $data->containingFrame->pageName);
        $this->assertEquals('nodeId', $data->containingFrame->nodeId);
        $this->assertEquals('name', $data->containingFrame->name);
        $this->assertEquals(0, $data->containingFrame->backgroundColor->r);
        $this->assertEquals(0, $data->containingFrame->backgroundColor->g);
        $this->assertEquals(0, $data->containingFrame->backgroundColor->b);
        $this->assertEquals(0, $data->containingFrame->backgroundColor->a);
    }
}
