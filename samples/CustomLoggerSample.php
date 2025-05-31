<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use Monolog\Handler\ErrorLogHandler;
use Monolog\Level;
use Monolog\Logger as MonologLogger;
use Turker\FigmaAPI\Endpoints\VersionHistoryEndpoint;
use Turker\FigmaAPI\FigmaClient;

$logger  = new MonologLogger('my-custom-logger');
$handler = new ErrorLogHandler(0, Level::Error);
$logger->pushHandler($handler);

$fileKey = 'my-file-key';

// Init FigmaClient with default cache and custom log driver by using API key.
$client = FigmaClient::factory(logger: $logger)->getWithApiKey('key');

// Also you can init like below.
// $fc = FigmaClient::factory();
// $fc->setLogDriver($logger);
// $client = $fc->getWithApiKey('key');

$endpoint = new VersionHistoryEndpoint($client);

$allHistory = $endpoint->fetchAll($fileKey);

$versions = $allHistory->versions;
