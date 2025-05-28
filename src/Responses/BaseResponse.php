<?php

namespace Turker\FigmaAPI\Responses;

abstract class BaseResponse
{
    abstract public function __construct(array $data);

    public static function build(array $data): static
    {
        return new static($data);
    }
}
