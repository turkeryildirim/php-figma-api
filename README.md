# PHP Library for Figma Rest API

A PHP library for Figma's rest API but does not cover all endpoints and properties "fully".

## Description

This library was developed for the Figma REST API, but it doesn't support all API endpoints and properties. This is
because some endpoints are only accessible to enterprise accounts, and since I don't have access to such an account,
these endpoints were disregarded.

Due to inconsistencies in property naming across various endpoints (e.g., style_type and styleType), all naming
conventions used within this library have been standardized to camel case, rather than adhering to the existing
inconsistent naming in the API.

## Supported API endpoints
* Comments
* Reactions
* Components
* Component Sets
* Files
* Projects
* Styles
* Users
* Version history

## Disregarded API endpoints
* Webhooks
* Activity logs
* Payments
* Variables
* Dev resources
* Library analytics

## Installation

You can install php figma api library using Composer:

```
composer require turkeryildirim/figma-api
```

You will then need to:

* run ``composer install`` to get these dependencies added to your vendor directory
* add the autoloader to your application with this line: ``require("vendor/autoload.php")``

## Documentation

You can read more details about API endpoints and properties
from [official Figma rest api  documentation](https://www.figma.com/developers/api).

All fields are populated with response data received from the API endpoint, ensuring consistency with the designated 
data type. For instance, if a field is defined as a boolean, but the response data from the endpoint returns it as a 
string (e.g., "remote": "false"), it will still be converted to a boolean data type.

All empty fields in the response data (whether null or empty) are converted to null, regardless of the field’s original 
type. For example, the children field is defined as an array but if the response data returns an empty array, this 
field will be marked as null.

Fields that are defined for the relevant response but are absent from the response data will also be marked as null 
(e.g., user email).

## How to use
Just check out [samples](https://github.com/turkeryildirim/php-figma-api/tree/main/samples) 
and [tests](https://github.com/turkeryildirim/php-figma-api/tree/main/test)

###

## License

PHP library for Figma rest api is licensed
under [MIT](https://github.com/turkeryildirim/php-figma-api/blob/main/LICENSE).
