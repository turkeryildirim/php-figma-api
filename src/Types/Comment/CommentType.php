<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\Comment;

use Turker\FigmaAPI\Traits\CreatedAtTrait;
use Turker\FigmaAPI\Traits\FileKeyTrait;
use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\ReactionsTrait;
use Turker\FigmaAPI\Traits\UserTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Types\Common\VectorType;

class CommentType extends AbstractType
{
    use IdTrait;
    use FileKeyTrait;
    use UserTrait;
    use CreatedAtTrait;
    use ReactionsTrait;

    public readonly ?string $uuid;
    public readonly ?string $message;
    public readonly int $orderId;
    public readonly ?string $parentId;
    public readonly ?string $resolvedAt;
    public readonly VectorType|FrameOffsetType|RegionType|FrameOffsetRegionType $clientMeta;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->resolvedAt = $data['resolved_at'] ?? null;
        $this->uuid       = $data['uuid'] ?? null;
        $this->message    = $data['message'] ?? null;
        $this->orderId    = intval($data['order_id'] ?? null);
        $this->parentId   = $data['parent_id'] ?? null;
        $meta             = new ClientMetaType($data['client_meta']);
        $this->clientMeta = $meta();
    }
}
