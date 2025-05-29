<?php

declare(strict_types=1);

namespace Turker\FigmaAPI;

use Psr\Log\LoggerInterface;
use Psr\SimpleCache\CacheInterface;
use Turker\FigmaAPI\Util\ArrayCache;
use Turker\FigmaAPI\Util\HttpClient;
use Turker\FigmaAPI\Util\Logger;

final class FigmaClient
{
    private ?LoggerInterface $logger;
    private ?CacheInterface $cache;
    public function __construct(LoggerInterface $logger = null, CacheInterface $cache = null)
    {
        $this->cache  = $cache;
        $this->logger = $logger;
    }

    public function setCacheDriver(?CacheInterface $cache): FigmaClient
    {
        $this->cache = $cache;
        return $this;
    }

    public function setLogDriver(?LoggerInterface $logger): FigmaClient
    {
        $this->logger = $logger;
        return $this;
    }

    public function getWithApiKey(string $apiKey): HttpClient
    {
        $this->logger = $this->logger ?? new Logger();
        $this->cache  = $this->cache ?? new ArrayCache();
        $client       = new HttpClient($this->logger, $this->cache);
        $client->setApiKey($apiKey);
        return $client;
    }

    public static function factory(?CacheInterface $cache = null, ?LoggerInterface $logger = null): FigmaClient
    {
        return new FigmaClient($logger, $cache);
    }
}
