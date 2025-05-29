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
$fc = FigmaClient::factory(logger: $logger)->getWithApiKey('key');

$endpoint = new VersionHistoryEndpoint($fc);

$allHistory = $endpoint->fetchAll($fileKey);

$versions = $allHistory->versions;
