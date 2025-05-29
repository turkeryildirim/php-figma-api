<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use Turker\FigmaAPI\Endpoints\VersionHistoryEndpoint;
use Turker\FigmaAPI\FigmaClient;

// File key that can be retrieved from other endpoints like FilesEndpoint.
$fileKey = 'my-file-key';

// Init FigmaClient with default cache and log driver by using API key.
$fc = FigmaClient::factory()->getWithApiKey('key');

// Init Version history endpoint.
$endpoint = new VersionHistoryEndpoint($fc);

// Fetch all versions belongs to the file.
$allHistory = $endpoint->fetchAll($fileKey);

// Get versions.
$versions = $allHistory->versions;

// All fields will be populated with proper data. If no data returns from the endpoint, props will be set
// to default value which is defined in the official API documentation.
// If there is no default value then all missing or empty props set as NULL.
foreach ($versions as $version) {
    $id          = $version->id;
    $description = $version->description;
    $label       = $version->label;
    $createdAt   = $version->createdAt;
    $user        = $version->user;
    $userId      = $user->id;
    $imgUrl      = $user->imgUrl;
    $handle      = $user->handle;
    $email       = $user->email;
}
