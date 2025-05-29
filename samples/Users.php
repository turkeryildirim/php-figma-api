<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use Turker\FigmaAPI\Endpoints\UsersEndpoint;
use Turker\FigmaAPI\FigmaClient;

// Init FigmaClient with default cache and log driver by using API key.
$fc = FigmaClient::factory()->getWithApiKey('key');

// Init Users endpoint.
$endpoint = new UsersEndpoint($fc);

// Fetch all data belongs to API key holder.
$data = $endpoint->me();

// All fields will be populated with proper data. If no data returns from the endpoint, props will be set
// to default value which is defined in the official API documentation.
// If there is no default value then all missing or empty props set as NULL.
$userId = $data->user->id;
$imgUrl = $data->user->imgUrl;
$handle = $data->user->handle;
$email  = $data->user->email;
