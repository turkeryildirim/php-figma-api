<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Endpoints;

use Turker\FigmaAPI\Endpoints\CommentsEndpoint;
use Turker\FigmaAPI\Responses\Comments\DeleteReactionsResponse;
use Turker\FigmaAPI\Responses\Comments\GetReactionsResponse;
use Turker\FigmaAPI\Responses\Comments\PostReactionsResponse;
use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Test\ResponseMockData;

final class ReactionsTest extends AbstractBaseTestCase
{
    public function testFetchReactions(): void
    {
        $this->successResponse(ResponseMockData::GET_REACTION);
        $response = new CommentsEndpoint($this->httpClient);
        $data = $response->fetchReactions('fileKey', 'commentid');

        $this->assertInstanceOf(CommentsEndpoint::class, $response);
        $this->assertInstanceOf(GetReactionsResponse::class, $data);
        $this->assertIsArray($data->reactions);
        $this->assertEquals(':heart:', $data->reactions[0]->emoji);
        $this->assertEquals('created_at', $data->reactions[0]->createdAt);

        $this->assertNull($data->reactions[0]->user->email);
        $this->assertEquals('id', $data->reactions[0]->user->id);
        $this->assertEquals('handle', $data->reactions[0]->user->handle);
        $this->assertEquals('img_url', $data->reactions[0]->user->imgUrl);
    }

    public function testStoreReaction(): void
    {
        $this->successResponse(ResponseMockData::POST_REACTION);
        $response = new CommentsEndpoint($this->httpClient);
        $data = $response->storeReaction('file_key', 'message', 'emoji');

        $this->assertInstanceOf(CommentsEndpoint::class, $response);
        $this->assertInstanceOf(PostReactionsResponse::class, $data);
        $this->assertTrue($data->status);
    }

    public function testRemoveReaction(): void
    {
        $this->successResponse(ResponseMockData::DELETE_REACTION);
        $response = new CommentsEndpoint($this->httpClient);
        $data = $response->removeReaction('file_key', 'comment_id', 'emoji');

        $this->assertInstanceOf(CommentsEndpoint::class, $response);
        $this->assertInstanceOf(DeleteReactionsResponse::class, $data);
        $this->assertTrue($data->status);
    }
}
