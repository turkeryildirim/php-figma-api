<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Util;

final class Helper
{
    public static function toHttpQuery(string|array $params): string
    {
        if (empty($params)) {
            return '';
        }
        if (is_string($params)) {
            return '?' . ltrim($params, '?');
        }
        $params = array_map(function ($value) {
            return ($value === null) ? 'null' : $value;
        }, $params);
        return '?' . http_build_query($params, '', '&');
    }
    public static function getenv(string $name): ?string
    {
        if (isset($_SERVER[$name])) {
            return (string) $_SERVER[$name];
        }

        if (PHP_SAPI === 'cli' && !empty(getenv($name))) {
            return (string) getenv($name);
        }

        return null;
    }
    public static function jsonEncode($content, int $flags = 0, int $depth = 512): ?string
    {
        $json = json_encode($content, $flags, $depth);
        if (JSON_ERROR_NONE === json_last_error()) {
            /** @var string */
            return $json;
        }
        return null;
    }
    public static function jsonDecode(
        string $json,
        bool $associative = true,
        int $depth = 512,
        int $flags = 0
    ): array {
        $json = json_decode($json, $associative, $depth, $flags);
        if (JSON_ERROR_NONE === json_last_error()) {
            /** @var array */
            return $json;
        }

        return [];
    }
    public static function toArrayMatrix(string $identityMatrixString): ?array
    {
        if (empty($identityMatrixString)) {
            return null;
        }

        $identityMatrixString = str_replace(array('[',']',' '), array('','',''), $identityMatrixString);

        $identityMatrixString = explode(',', $identityMatrixString);
        if (count($identityMatrixString) !== 9) {
            return null;
        }

        return array_chunk($identityMatrixString, 3);
    }
}
