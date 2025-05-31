<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Endpoints;

use Turker\FigmaAPI\Endpoints\ProjectsEndpoint;
use Turker\FigmaAPI\Responses\Projects\ProjectFilesResponse;
use Turker\FigmaAPI\Responses\Projects\ProjectsResponse;
use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Tests\ResponseMockData;

final class ProjectsTest extends AbstractBaseTestCase
{
    public function testFetchProjects(): void
    {
        $this->successResponse(ResponseMockData::PROJECT);
        $response = new ProjectsEndpoint($this->httpClient);
        $data     = $response->fetchProjects('team_id');

        $this->assertInstanceOf(ProjectsEndpoint::class, $response);
        $this->assertInstanceOf(ProjectsResponse::class, $data);
        $this->assertIsArray($data->projects);

        $this->assertEquals('name', $data->name);
        $this->assertEquals('Team project', $data->projects[0]->name);
        $this->assertEquals('123456789', $data->projects[0]->id);
    }

    public function testFetchFiles(): void
    {
        $this->successResponse(ResponseMockData::PROJECT_FILES);
        $response = new ProjectsEndpoint($this->httpClient);
        $data     = $response->fetchFiles('project_id', true);

        $this->assertInstanceOf(ProjectsEndpoint::class, $response);
        $this->assertInstanceOf(ProjectFilesResponse::class, $data);
        $this->assertIsArray($data->files);

        $this->assertEquals('Team project', $data->name);
        $this->assertEquals('key2', $data->files[1]->key);
        $this->assertEquals('library', $data->files[1]->name);
        $this->assertEquals('thumbnail_url2', $data->files[1]->thumbnailUrl);
        $this->assertEquals('last_modified2', $data->files[1]->lastModified);
        $this->assertNull($data->files[1]->branches);
    }
}
