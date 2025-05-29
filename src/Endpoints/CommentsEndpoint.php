<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Endpoints;

use Turker\FigmaAPI\Responses\Comments\PostCommentsResponse as PostCommentsResponse;
use Turker\FigmaAPI\Responses\Comments\DeleteCommentsResponse as DeleteCommentsResponse;
use Turker\FigmaAPI\Responses\Comments\DeleteReactionsResponse as DeleteReactionsResponse;
use Turker\FigmaAPI\Responses\Comments\GetCommentsResponse as GetCommentsResponse;
use Turker\FigmaAPI\Responses\Comments\GetReactionsResponse as GetReactionsResponse;
use Turker\FigmaAPI\Responses\Comments\PostReactionsResponse as PostReactionsResponse;

/**
 * https://www.figma.com/developers/api#comments
 */
final class CommentsEndpoint extends BaseEndpoint
{
    public function fetchComments(string $fileKey, bool $asMd = false): GetCommentsResponse
    {
        $data = $this->client->get(
            'files/' . $fileKey . '/comments',
            ['ad_md' => var_export($asMd, true)]
        );
        return GetCommentsResponse::build($data);
    }
    public function fetchReactions(string $fileKey, string $commentId, ?string $cursor = null): GetReactionsResponse
    {
        $params = [];
        if (!empty($cursor)) {
            $params['cursor'] = $cursor;
        }
        $data = $this->client->get(
            'files/' . $fileKey . '/comments/' . $commentId . '/reactions',
            $params
        );
        return GetReactionsResponse::build($data);
    }
    public function storeComment(string $fileKey, string $message, ?string $commentId = null): PostCommentsResponse
    {
        $body = [
             'message' => $message,
             'comment_id' => $commentId,
        ];
        $data = $this->client->post(
            'files/' . $fileKey . '/comments/',
            $body
        );
        return PostCommentsResponse::build($data);
    }
    public function storeReaction(string $fileKey, string $commentId, string $emoji): PostReactionsResponse
    {
        $body = [
            'emoji' => $emoji,
        ];
        $data = $this->client->post(
            'files/' . $fileKey . '/comments/' . $commentId . '/reactions',
            $body
        );
        return PostReactionsResponse::build($data);
    }
    public function removeComment(string $fileKey, string $commentId): DeleteCommentsResponse
    {

        $data = $this->client->delete(
            'files/' . $fileKey . '/comments/' . $commentId,
        );
        return DeleteCommentsResponse::build($data);
    }
    public function removeReaction(string $fileKey, string $commentId, string $emoji): DeleteReactionsResponse
    {
        $data = $this->client->delete(
            'files/' . $fileKey . '/comments/' . $commentId . '/reactions',
            ['emoji' => $emoji]
        );
        return DeleteReactionsResponse::build($data);
    }
}
