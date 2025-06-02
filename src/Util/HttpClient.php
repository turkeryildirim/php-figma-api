<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Util;

use Exception;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\SimpleCache\CacheInterface;
use Stringable;
use Turker\FigmaAPI\Exception\FigmaAPIException;
use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;

final class HttpClient
{
    private string $apiKey  = '';
    private string $baseUrl = 'https://api.figma.com/v1/';
    private array $header   = [];
    private ?LoggerInterface $logger;
    private ?CacheInterface $cache;

    private array $defaults = [
        'base_uri' => 'https://api.figma.com/v1/',
        'headers' => [
            'Content-Type' => 'application/json',
            'User-Agent' => 'PHP Library for Figma Rest API'
        ],
        'http_errors' => false,
        'verify' => false,
    ];

    public function __construct(
        ?LoggerInterface $logger = null,
        ?CacheInterface $cache = null,
    ) {
        $this->logger = $logger;
        $this->cache  = $cache;
    }
    public function setApiKey(string $apiKey): HttpClient
    {
        $this->addHeader(['X-Figma-Token' => $apiKey]);
        $this->apiKey = $apiKey;
        return $this;
    }
    public function getApiKey(): string
    {
        return $this->apiKey;
    }
    public function setBaseUrl(string $baseUrl): HttpClient
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        return $this;
    }
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }
    public function getHeader(): array
    {
        return $this->header;
    }
    public function setHeader(array $header): HttpClient
    {
        $this->header = $header;
        return $this;
    }
    public function addHeader(array $header): HttpClient
    {
        $this->header = array_merge($this->header, $header);
        return $this;
    }
    public function post(string $endpoint, mixed $body): array
    {
        $this->log('info', 'POST request', [$endpoint]);
        $this->removeFromCache($endpoint);
        return $this->request('post', $endpoint, [], $body);
    }
    public function put(string $endpoint, mixed $body): array
    {
        $this->log('info', 'PUT request', [$endpoint]);
        $this->removeFromCache($endpoint);
        return $this->request('put', $endpoint, [], $body);
    }
    public function delete(string $endpoint, array $queryParams = []): array
    {
        $url = $this->buildUrl($endpoint, $queryParams);
        $this->log('info', 'DELETE request', [$url]);
        $this->removeFromCache($url);
        return $this->request('delete', $endpoint, $queryParams);
    }
    public function get(string $endpoint, array $queryParams = []): mixed
    {
        $url = $this->buildUrl($endpoint, $queryParams);
        $this->log('info', 'GET request', [$url]);
        $key   = md5($url);
        $cache = $this->fetchFromCache($key);
        if (null !== $cache) {
            $this->log('info', 'GET request data returned from cache', [$key]);
            return $cache;
        }

        $data = $this->request('get', $endpoint, $queryParams);
        $this->storeToCache($key, $data);
        $this->log('info', 'GET request data set to cache', [$key]);

        return $data;
    }
    private function request(string $method, string $endpoint, array $queryParams = [], mixed $body = null): array
    {
        try {
            if (empty($this->getBaseUrl())) {
                throw new Exception('Base URL must be set');
            }

            if (empty($this->getApiKey())) {
                throw new Exception('API key must be set');
            }

            if (in_array($method, ['post', 'put']) && empty($body)) {
                throw new Exception('Body required for POST and PUT requests');
            }

            $body = in_array($method, ['post', 'put']) ? Helper::jsonEncode($body) : null;

            $method = strtolower($method);

            $client = new Client($this->prepareConfig());

            $uri = $this->buildUrl($endpoint, $queryParams);

            $request = new Request($method, $uri, $this->getHeader(), $body);

            $response = $client->send($request);

            if ($response->getStatusCode() >= 299) {
                $returnedMessage = Helper::jsonDecode($response->getBody()->getContents());
                $returnedMessage = empty($returnedMessage) ? '' : 'Response message: ' . $returnedMessage['err'];

                $this->log(
                    'error',
                    'Request failed with HTTP code ' . $response->getStatusCode() . '. ' . $returnedMessage,
                    [$uri]
                );


                throw new FigmaAPIException(
                    "Request failed with HTTP code " . $response->getStatusCode() . '. ' . $returnedMessage,
                    $response->getStatusCode()
                );
            }

            $content = $response->getBody()->getContents();
            return $this->setEmptyStringToNull(Helper::jsonDecode($content));
        } catch (ClientExceptionInterface | Exception $exception) {
            $this->log('error', $exception->getMessage(), [$exception]);
            throw new FigmaAPIException($exception->getMessage());
        }
    }
    private function log(mixed $level, string|Stringable $message, array $context = []): void
    {
        if (null === $this->logger) {
            return;
        }

        $this->logger->log($level, 'Figma API: ' . $message, $context);
    }
    private function storeToCache(string $key, mixed $data, int $ttl = 300): void
    {
        if (null === $this->cache) {
            return;
        }

        if ($this->cache->get($key) === $data) {
            return;
        }

        $this->cache->set($key, $data, $ttl);
    }
    private function fetchFromCache(string $key): mixed
    {
        return $this->cache?->get($key);
    }
    private function removeFromCache(string $key): void
    {
        if (null === $this->cache) {
            return;
        }

        $this->cache->delete($key);
    }
    private function setEmptyStringToNull(array $content): array
    {
        foreach ($content as $key => $value) {
            if (is_array($value)) {
                $content[$key] = $this->setEmptyStringToNull($value);
            }
            if ($value === "") {
                $content[$key] = null;
            }
        }

        return $content;
    }
    private function prepareConfig(): array
    {
        $config            = $this->defaults;
        $config['headers'] = array_merge($config['headers'], $this->getHeader());
        return $config;
    }
    private function buildUrl(string $endpoint, array $queryParams = []): string
    {
        $url = $this->getBaseUrl() . $endpoint;
        if (!empty($queryParams)) {
            $url .= Helper::toHttpQuery($queryParams);
        }
        return $url;
    }
    final public function __injectTestHandler(MockHandler $mock): void
    {
        $handlerStack              = HandlerStack::create($mock);
        $this->defaults['handler'] = $handlerStack;
    }
}
