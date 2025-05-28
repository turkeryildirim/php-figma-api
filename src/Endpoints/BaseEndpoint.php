<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Endpoints;

use Turker\FigmaAPI\Util\HttpClient;

class BaseEndpoint
{
    protected HttpClient $client;
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }
}
