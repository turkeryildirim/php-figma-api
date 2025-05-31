<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Endpoints;

use Turker\FigmaAPI\Endpoints\ComponentSetsEndpoint;
use Turker\FigmaAPI\Responses\ComponentSets\ComponentSetResponse;
use Turker\FigmaAPI\Responses\ComponentSets\FileComponentSetsResponse;
use Turker\FigmaAPI\Responses\ComponentSets\TeamComponentSetsResponse;
use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Tests\ResponseMockData;
use Turker\FigmaAPI\Types\Common\CursorType;
use Turker\FigmaAPI\Types\ComponentSet\ComponentSetType;

final class ComponentSetsTest extends AbstractBaseTestCase
{
    public function testFetchTeamComponentSets(): void
    {
        $this->successResponse(ResponseMockData::TEAM_COMPONENT_SET);
        $response = new ComponentSetsEndpoint($this->httpClient);
        $data     = $response->fetchTeamComponentSets('team_id');

        $this->assertInstanceOf(ComponentSetsEndpoint::class, $response);
        $this->assertInstanceOf(TeamComponentSetsResponse::class, $data);
        $this->assertEquals(200, $data->status);
        $this->assertFalse($data->error);

        $this->assertIsArray($data->meta['componentSets']);
        $this->assertIsObject($data->meta['cursor']);

        $this->assertInstanceOf(CursorType::class, $data->meta['cursor']);
        $this->assertEquals(43410457.04840246, $data->meta['cursor']->before);
        $this->assertEquals(1752485.0628680736, $data->meta['cursor']->after);
        $this->assertInstanceOf(ComponentSetType::class, $data->meta['componentSets'][0]);
        $this->runSharedTests($data->meta['componentSets'][0]);
    }

    public function testFetchFileComponentSets(): void
    {
        $this->successResponse(ResponseMockData::FILE_COMPONENT_SET);
        $response = new ComponentSetsEndpoint($this->httpClient);
        $data     = $response->fetchFileComponentSets('fileKey');

        $this->assertInstanceOf(ComponentSetsEndpoint::class, $response);
        $this->assertInstanceOf(FileComponentSetsResponse::class, $data);
        $this->assertEquals(200, $data->status);
        $this->assertFalse($data->error);

        $this->assertIsArray($data->meta['componentSets']);
        $this->assertInstanceOf(ComponentSetType::class, $data->meta['componentSets'][0]);
        $this->runSharedTests($data->meta['componentSets'][0]);
    }

    public function testFetchComponentSet(): void
    {
        $this->successResponse(ResponseMockData::COMPONENT_SET);
        $response = new ComponentSetsEndpoint($this->httpClient);
        $data     = $response->fetchComponentSet('key');

        $this->assertInstanceOf(ComponentSetsEndpoint::class, $response);
        $this->assertInstanceOf(ComponentSetResponse::class, $data);
        $this->assertInstanceOf(ComponentSetType::class, $data->meta);
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
