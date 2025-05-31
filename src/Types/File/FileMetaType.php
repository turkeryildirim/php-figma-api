<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\NameTrait;
use Turker\FigmaAPI\Traits\ThumbnailUrlTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Types\User\UserType;
use Turker\FigmaAPI\Util\Helper;

class FileMetaType extends AbstractType
{
    use NameTrait;
    use ThumbnailUrlTrait;

    public readonly ?UserType $creator;
    public readonly ?UserType $lastTouchedBy;
    public readonly ?string $folderName;
    public readonly ?string $lastTouchedAt;
    public readonly ?string $role;
    public readonly ?string $version;
    public readonly ?string $linkAccess;
    public readonly ?string $url;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);

        $this->role          = $data['role'] ?? null;
        $this->lastTouchedAt = $data['last_touched_at'] ?? null;
        $this->folderName    = $data['folder_name'] ?? null;
        $this->version       = $data['version'] ?? null;
        $this->linkAccess    = $data['link_access'] ?? null;
        $this->url           = $data['url'] ?? null;
        $this->creator       = Helper::makeObject($data['creator'], UserType::class);
        $this->lastTouchedBy = Helper::makeObject($data['last_touched_by'], UserType::class);
    }
}
