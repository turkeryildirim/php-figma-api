<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Util;

use Monolog\Handler\ErrorLogHandler;
use Monolog\Level;
use Monolog\Logger as MonologLogger;
use Psr\Log\LoggerInterface;
use Stringable;

final class Logger implements LoggerInterface
{
    private LoggerInterface $logger;

    public function __construct()
    {
        $logger = new MonologLogger('figma-api');
        $handler = new ErrorLogHandler(0, Level::Debug);
        $logger->pushHandler($handler);

        $this->logger = $logger;
    }
    public function debug(string|Stringable $message, array $context = []): void
    {
        $this->logger->debug($message, $context);
    }
    public function info(string|Stringable $message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }
    public function notice(string|Stringable $message, array $context = []): void
    {
        $this->logger->notice($message, $context);
    }
    public function warning(string|Stringable $message, array $context = []): void
    {
        $this->logger->warning($message, $context);
    }
    public function error(string|Stringable $message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }
    public function critical(string|Stringable $message, array $context = []): void
    {
        $this->logger->critical($message, $context);
    }
    public function alert(string|Stringable $message, array $context = []): void
    {
        $this->logger->alert($message, $context);
    }
    public function emergency(string|Stringable $message, array $context = []): void
    {
        $this->logger->emergency($message, $context);
    }
    public function log($level, string|Stringable $message, array $context = []): void
    {
        $this->logger->log($level, $message, $context);
    }
}
