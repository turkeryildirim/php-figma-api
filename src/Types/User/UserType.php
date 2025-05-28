<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\User;

use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Types\AbstractType;

class UserType extends AbstractType
{
    use IdTrait;

    public readonly ?string $handle;
    public readonly ?string $email;
    public readonly ?string $imgUrl;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->imgUrl = $data['img_url'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->handle = $data['handle'] ?? null;
    }
}
