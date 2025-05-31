<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Endpoints;

use Turker\FigmaAPI\Endpoints\VersionHistoryEndpoint;
use Turker\FigmaAPI\Responses\VersionHistory\VersionHistoryResponse;
use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Tests\ResponseMockData;
use Turker\FigmaAPI\Types\Common\PaginationType;
use Turker\FigmaAPI\Types\User\UserType;
use Turker\FigmaAPI\Types\VersionHistory\VersionHistoryType;

final class VersionHistoryTest extends AbstractBaseTestCase
{
    public function testFetchAllEndpoint(): void
    {
        $this->successResponse(ResponseMockData::VERSION_HISTORY);
        $response = new VersionHistoryEndpoint($this->httpClient);
        $data     = $response->fetchAll('fileKey');

        $this->assertInstanceOf(VersionHistoryEndpoint::class, $response);
        $this->assertInstanceOf(VersionHistoryResponse::class, $data);

        $this->assertInstanceOf(PaginationType::class, $data->pagination);
        $this->assertEquals('next_page', $data->pagination->nextPage);
        $this->assertNull($data->pagination->prevPage);

        $this->assertIsArray($data->versions);
        $this->assertInstanceOf(VersionHistoryType::class, $data->versions[0]);
        $this->assertEquals('id', $data->versions[0]->id);
        $this->assertEquals('created_at', $data->versions[0]->createdAt);
        $this->assertEquals('label', $data->versions[0]->label);
        $this->assertNull($data->versions[0]->description);

        $this->assertInstanceOf(UserType::class, $data->versions[0]->user);
        $this->assertEquals('id', $data->versions[0]->user->id);
        $this->assertEquals('handle', $data->versions[0]->user->handle);
        $this->assertEquals('img_url', $data->versions[0]->user->imgUrl);
        $this->assertNull($data->versions[0]->user->email);
    }

    public function testFetchAllNullEndpoint(): void
    {
        $this->successResponse(ResponseMockData::VERSION_HISTORY_NULL);
        $response = new VersionHistoryEndpoint($this->httpClient);
        $data     = $response->fetchAll('fileKey');

        $this->assertInstanceOf(VersionHistoryEndpoint::class, $response);
        $this->assertInstanceOf(VersionHistoryResponse::class, $data);
        $this->assertNull($data->versions);
        $this->assertNull($data->pagination);
    }
}
