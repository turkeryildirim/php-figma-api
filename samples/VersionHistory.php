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
$history = new VersionHistoryEndpoint($fc);

// Fetch all versions belongs to the file.
$allHistory = $history->fetchAll($fileKey);

// Get versions.
$versions = $allHistory->versions;

// All fields will be populated with proper data. If no data returns from endpoint, props will be set
// to default values which is defined in the official API documentation.
// If there is no default value all missing props set as NULL.
// e.g This endpoint does not return user email so it'll be set as NULL.
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
