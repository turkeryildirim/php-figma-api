<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\File;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\File\UpdateMediaRuntimeActionType;
use TypeError;

final class UpdateMediaRuntimeActionTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new UpdateMediaRuntimeActionType([
            'type' => 'type',
            'destinationId' => 'destinationId',
            'mediaAction' => 'TOGGLE_PLAY_PAUSE',
            'amountToSkip' => 10,
            'newTimestamp' => 20
        ]);
        $this->assertEquals('type', $class->type);
        $this->assertEquals('destinationId', $class->destinationId);
        $this->assertEquals('10', $class->amountToSkip);
        $this->assertEquals('20', $class->newTimestamp);
        $this->assertEquals('TOGGLE_PLAY_PAUSE', $class->mediaAction);
    }
    public function testWithMinData(): void
    {
        $class = new UpdateMediaRuntimeActionType(['type' => 'type']);
        $this->assertEquals('type', $class->type);
        $this->assertNull($class->destinationId);
        $this->assertNull($class->amountToSkip);
        $this->assertNull($class->newTimestamp);
        $this->assertNull($class->mediaAction);
    }
    public function testInvalidAmountToSkip(): void
    {
        $class = new UpdateMediaRuntimeActionType([
            'type' => 'type',
            'amountToSkip' => 'amountToSkip',
        ]);
        $this->assertNull($class->amountToSkip);
    }
    public function testInvalidNewTimestamp(): void
    {
        $class = new UpdateMediaRuntimeActionType([
            'type' => 'type',
            'newTimestamp' => 'newTimestamp',
        ]);
        $this->assertNull($class->newTimestamp);
    }
    public function testInvalidMediaAction(): void
    {
        $class = new UpdateMediaRuntimeActionType([
            'type' => 'type',
            'mediaAction' => 'mediaAction',
        ]);
        $this->assertNull($class->mediaAction);
    }
}
