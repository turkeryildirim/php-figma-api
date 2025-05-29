<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use Turker\FigmaAPI\Endpoints\FilesEndpoint;
use Turker\FigmaAPI\FigmaClient;

$fileKey = 'my-file-key';

$fc = FigmaClient::factory()->getWithApiKey('key');

$endpoint = new FilesEndpoint($fc);

$response = $endpoint->fetchFile($fileKey);

$data = $response->file;

// All fields will be populated with proper data. If no data returns from the endpoint, props will be set
// to default value which is defined in the official API documentation.
// If there is no default value then all missing or empty props set as NULL.
$version       = $data->version;
$role          = $data->role;
$name          = $data->name;
$mainFileKey   = $data->mainFileKey;
$thumbnailUrl  = $data->thumbnailUrl;
$styles        = $data->styles;
$document      = $data->document;
$branches      = $data->branches;
$components    = $data->components;
$componentSets = $data->componentSets;

foreach ($styles as $style) {
    $key         = $style->key;
    $name        = $style->name;
    $description = $style->description;
    $remote      = $style->remote;
    $styleType   = $style->styleType->value;
}

foreach ($branches as $branch) {
    $key          = $branch->key;
    $name         = $branch->name;
    $thumbnailUrl = $branch->thumbnailUrl;
    $lastModified = $branch->lastModified;
}

foreach ($components as $component) {
    $documentationLinks = $component->documentationLinks;
    $key                = $component->key;
    $name               = $component->name;
    $description        = $component->description;
    $remote             = $component->remote;
    $componentSetId     = $component->componentSetId;
}

foreach ($componentSets as $componentSet) {
    $documentationLinks = $componentSet->documentationLinks;
    $key                = $componentSet->key;
    $name               = $componentSet->name;
    $description        = $componentSet->description;
    $remote             = $componentSet->remote;
}

$documentName           = $document->name;
$documentId             = $document->id;
$documentType           = $document->type;
$documentScrollBehavior = $document->scrollBehavior;
$documentChildren       = $document->children;
