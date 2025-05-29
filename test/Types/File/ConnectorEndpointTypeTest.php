<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Types\File;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Common\VectorType;
use Turker\FigmaAPI\Types\File\ConnectorEndpointType;
use TypeError;

final class ConnectorEndpointTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new ConnectorEndpointType([
            'endpointNodeId' => 'endpointNodeId',
            'position' => ['x' => 10, 'y' => 20],
            'magnet' => 'AUTO',
        ]);
        $this->assertEquals('endpointNodeId', $class->endpointNodeId);
        $this->assertInstanceOf(VectorType::class, $class->position);
        $this->assertEquals('10', $class->position->x);
        $this->assertEquals('20', $class->position->y);
        $this->assertEquals('AUTO', $class->magnet->value);
    }
    public function testInvalidEndpointNodeId(): void
    {
        $this->expectException(TypeError::class);
        new ConnectorEndpointType([
            'endpointNodeId' => 10,
            'position' => ['x' => 10, 'y' => 20],
            'magnet' => 'AUTO',
        ]);
    }
    public function testInvalidPosition(): void
    {
        $this->expectException(TypeError::class);
        new ConnectorEndpointType([
            'endpointNodeId' => 'endpointNodeId',
            'position' => 10,
            'magnet' => 'AUTO',
        ]);
    }
    public function testInvalidMagnet(): void
    {
        $this->expectException(TypeError::class);
        new ConnectorEndpointType([
            'endpointNodeId' => 'endpointNodeId',
            'position' => ['x' => 10, 'y' => 20],
            'magnet' => 'magnet',
        ]);
    }
}
