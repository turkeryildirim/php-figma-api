<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Endpoints;

use Turker\FigmaAPI\Endpoints\CommentsEndpoint;
use Turker\FigmaAPI\Responses\Comments\DeleteCommentsResponse;
use Turker\FigmaAPI\Responses\Comments\GetCommentsResponse;
use Turker\FigmaAPI\Responses\Comments\PostCommentsResponse;
use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Test\ResponseMockData;
use Turker\FigmaAPI\Types\Comment\CommentType;
use Turker\FigmaAPI\Types\Comment\FrameOffsetType;

final class CommentsTest extends AbstractBaseTestCase
{
    public function testFetchComments(): void
    {
        $this->successResponse(ResponseMockData::GET_COMMENTS);
        $response = new CommentsEndpoint($this->httpClient);
        $data     = $response->fetchComments('fileKey');

        $this->assertInstanceOf(CommentsEndpoint::class, $response);
        $this->assertInstanceOf(GetCommentsResponse::class, $data);
        $this->assertIsArray($data->comments);
        $this->runSharedTests($data->comments[1]);
    }

    public function testStoreComment(): void
    {
        $this->successResponse(ResponseMockData::POST_COMMENT);
        $response = new CommentsEndpoint($this->httpClient);
        $data     = $response->storeComment('file_key', 'message');

        $this->assertInstanceOf(CommentsEndpoint::class, $response);
        $this->assertInstanceOf(PostCommentsResponse::class, $data);
        $this->runSharedTests($data->comment);
    }

    public function testRemoveComment(): void
    {
        $this->successResponse(ResponseMockData::DELETE_COMMENT);
        $response = new CommentsEndpoint($this->httpClient);
        $data     = $response->removeComment('file_key', 'comment_id');

        $this->assertInstanceOf(CommentsEndpoint::class, $response);
        $this->assertInstanceOf(DeleteCommentsResponse::class, $data);
        $this->assertTrue($data->status);
    }

    private function runSharedTests(CommentType $data): void
    {
        $this->assertEquals('id', $data->id);
        $this->assertEquals('file_key', $data->filekey);
        $this->assertEquals('created_at', $data->createdAt);
        $this->assertEquals('resolved_at', $data->resolvedAt);
        $this->assertEquals('message', $data->message);
        $this->assertEquals('2', $data->orderId);
        $this->assertEquals('parent_id', $data->parentId);
        $this->assertNull($data->reactions);
        $this->assertNull($data->uuid);
        $this->assertInstanceOf(FrameOffsetType::class, $data->clientMeta);

        $this->assertNull($data->user->email);
        $this->assertEquals('id', $data->user->id);
        $this->assertEquals('handle', $data->user->handle);
        $this->assertEquals('img_url', $data->user->imgUrl);
    }
}
