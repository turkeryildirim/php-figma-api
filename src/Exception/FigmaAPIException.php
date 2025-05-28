<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Exception;

use Exception;

class FigmaAPIException extends Exception
{
    private array $errorCodes = [
        400 => 'Parameters are invalid or malformed. Please check the input formats. This error can also happen if the requested resources are too large to complete the request, which results in a timeout. Please reduce the number and size of objects requested.',
        403 => 'The request was valid, but the server is refusing action. This can happen if the caller does not have the necessary permissions, or when making HTTP requests instead of HTTPS requests.',
        404 => 'The requested file or resource was not found.',
        429 => 'Please wait a while before attempting the request again (typically a minute). Rate limiting is calculated on a per-user basis. If the caller is using an OAuth token, the rate limit is calculated based on the user associated with the token.',
        500 => 'An internal server error occurred. Please try again later.',
    ];
    public function __construct(string $message, int $code = 0, ?Exception $previous = null)
    {
        if (array_key_exists($code, $this->errorCodes)) {
            parent::__construct($this->errorCodes[$code], $code);
        } else {
            parent::__construct($message, $code, $previous);
        }
    }
}
