# PHP Library for Figma Rest API

A PHP library for Figma's rest API but does not cover all endpoints and properties "fully".

## Description

This library was developed for the Figma REST API, but it doesn't support all API endpoints and properties. This is
because some endpoints are only accessible to enterprise accounts, and since I don't have access to such an account,
these endpoints were disregarded.

Due to inconsistencies in property naming across various endpoints (e.g., style_type and styleType), all naming
conventions used within this library have been standardized to camel case, rather than adhering to the existing
inconsistent naming in the API.

You can find detailed explanations and examples in the "How to Use" section.

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

## How to use

###

## License

PHP library for Figma rest api is licensed
under [MIT](https://github.com/turkeryildirim/php-figma-api/blob/main/LICENSE).
