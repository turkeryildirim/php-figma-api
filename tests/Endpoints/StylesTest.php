<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Endpoints;

use Turker\FigmaAPI\Endpoints\StylesEndpoint;
use Turker\FigmaAPI\Responses\Styles\FileStylesResponse;
use Turker\FigmaAPI\Responses\Styles\StyleResponse;
use Turker\FigmaAPI\Responses\Styles\TeamStylesResponse;
use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Test\ResponseMockData;
use Turker\FigmaAPI\Types\Common\CursorType;
use Turker\FigmaAPI\Types\Style\StyleType;
use Turker\FigmaAPI\Types\User\UserType;

final class StylesTest extends AbstractBaseTestCase
{
    private StylesEndpoint $endpoint;
    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new StylesEndpoint($this->httpClient);
    }

    public function testFetchTeamStylesEndpoint(): void
    {
        $this->successResponse(ResponseMockData::TEAM_STYLE);
        $data = $this->endpoint->fetchTeamStyles('teamId');

        $this->assertInstanceOf(TeamStylesResponse::class, $data);
        $this->assertEquals(200, $data->status);
        $this->assertIsArray($data->meta['styles']);
        $this->assertIsObject($data->meta['cursor']);
        $this->assertInstanceOf(CursorType::class, $data->meta['cursor']);
        $this->assertEquals('before', $data->meta['cursor']->before);
        $this->assertEquals('after', $data->meta['cursor']->after);
        $this->assertInstanceOf(StyleType::class, $data->meta['styles'][0]);
        $this->runSharedTests($data->meta['styles'][0]);
    }

    public function testFetchFileStylesEndpoint(): void
    {
        $this->successResponse(ResponseMockData::FILE_STYLE);
        $data = $this->endpoint->fetchFileStyles('fileKey');

        $this->assertInstanceOf(FileStylesResponse::class, $data);
        $this->assertArrayNotHasKey('cursor', $data->meta);
        $this->assertEquals(200, $data->status);
        $this->assertFalse($data->error);

        $this->assertIsArray($data->meta['styles']);
        $this->assertInstanceOf(StyleType::class, $data->meta['styles'][0]);
        $this->runSharedTests($data->meta['styles'][0]);
    }

    public function testFetchStyleEndpoint(): void
    {
        $this->successResponse(ResponseMockData::STYLE);
        $data = $this->endpoint->fetchStyle('key');

        $this->assertInstanceOf(StyleResponse::class, $data);
        $this->assertInstanceOf(StyleType::class, $data->meta);
        $this->assertEquals(200, $data->status);
        $this->assertFalse($data->error);
        $this->runSharedTests($data->meta);
    }

    private function runSharedTests(StyleType $data): void
    {
        $this->assertInstanceOf(UserType::class, $data->user);
        $this->assertEquals('name', $data->name);
        $this->assertEquals('key', $data->key);
        $this->assertEquals('file_key', $data->filekey);
        $this->assertEquals('thumbnail_url', $data->thumbnailUrl);
        $this->assertNull($data->description);
        $this->assertEquals('sort_position', $data->sortPosition);
        $this->assertEquals('created_at', $data->createdAt);
        $this->assertEquals('updated_at', $data->updatedAt);
        $this->assertEquals('FILL', $data->styleType->value);

        $this->assertNull($data->user->email);
        $this->assertEquals('id', $data->user->id);
        $this->assertEquals('handle', $data->user->handle);
        $this->assertEquals('img_url', $data->user->imgUrl);
    }
}
