<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Util;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Util\Logger;

final class LogTest extends AbstractBaseTestCase
{
    private Logger $log;

    protected function setUp(): void
    {
        parent::setUp();
        $this->log = new Logger();
    }

    public function testLoggingMethodsDoNotThrow(): void
    {
        $this->log->debug('Debug message');
        $this->log->info('Info message');
        $this->log->notice('Notice message');
        $this->log->warning('Warning message');
        $this->log->error('Error message');
        $this->log->critical('Critical message');
        $this->log->alert('Alert message');
        $this->log->emergency('Emergency message');
        $this->log->log('info', 'Generic log');

        $this->expectNotToPerformAssertions();
    }
}
