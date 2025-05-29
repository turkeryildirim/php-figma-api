<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use Turker\FigmaAPI\Endpoints\StylesEndpoint;
use Turker\FigmaAPI\FigmaClient;

// File key that can be retrieved from other endpoints like FilesEndpoint.
$fileKey = 'my-file-key';

// Init FigmaClient with default cache and log driver by using API key.
$fc = FigmaClient::factory()->getWithApiKey('key');

// Init Styles endpoint.
$history = new StylesEndpoint($fc);

// Fetch all styles belongs to the file.
$response = $history->fetchStyle($fileKey);

$status = $response->status;
$error  = $response->error;
$data   = $response->meta;

// All fields will be populated with proper data. If no data returns from the endpoint, props will be set
// to default value which is defined in the official API documentation.
// If there is no default value then all missing or empty props set as NULL.
$nodeId       = $data->nodeId;
$name         = $data->name;
$key          = $data->key;
$fileKey      = $data->filekey;
$thumbnailUrl = $data->thumbnailUrl;
$description  = $data->description;
$sortPosition = $data->sortPosition;
$createdAt    = $data->createdAt;
$updatedAt    = $data->updatedAt;
$styleType    = $data->styleType->value;
$id           = $data->user->id;
$handle       = $data->user->handle;
$imgUrl       = $data->user->imgUrl;
