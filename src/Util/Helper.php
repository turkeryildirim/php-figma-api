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
    public static function jsonEncode(mixed $content, int $flags = 0, int $depth = 512): ?string
    {
        /** @phpstan-ignore-next-line */
        $json = json_encode($content, $flags, $depth);
        if (JSON_ERROR_NONE === json_last_error() && false !== $json) {
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
        /** @phpstan-ignore-next-line */
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

        $identityMatrixString = str_replace(['[',']',' '], ['','',''], $identityMatrixString);

        $identityMatrixString = explode(',', $identityMatrixString);
        if (count($identityMatrixString) !== 9) {
            return null;
        }

        return array_chunk($identityMatrixString, 3);
    }
    public static function makeInteger(mixed $value, int|float|null $default = null): int|float|null
    {
        if (is_numeric($value)) {
            return is_int($value) ? $value : floatval($value);
        }
        return $default;
    }
    public static function makeBoolean(mixed $value, bool|null $default = null): ?bool
    {
        if (is_bool($value)) {
            return $value;
        }
        if (is_string($value)) {
            $value = trim($value);
            if ($value === "true") {
                return true;
            }
            if ($value === "false") {
                return false;
            }
        }
        return $default;
    }
    public static function makeArrayOfObjects(mixed $data, string $class, bool $preserveKeys = false): ?array
    {
        if (empty($data) || !is_array($data) || empty($class)) {
            return null;
        }

        $array = [];
        foreach ($data as $key => $sub) {
            if (!$preserveKeys) {
                $array[] = self::makeObject($sub, $class);
            } else {
                $array[$key] = self::makeObject($sub, $class);
            }
        }

        foreach ($array as $var) {
            if (!empty($var) || is_int($var) || is_float($var)) {
                return $array;
            }
        }
        return null;
    }
    public static function makeObject(mixed $data, string $class): mixed
    {
        if (empty($data) || !is_array($data) || empty($class)) {
            return null;
        }

        $build     = new $class($data);
        $classVars = get_object_vars($build);
        foreach ($classVars as $var) {
            if (!empty($var) || is_int($var) || is_float($var)) {
                return $build;
            }
        }
        return null;
    }
    public static function makeFromEnum(?string $data, string $class, ?string $default = null): ?string
    {
        if (empty($data) || empty($class) || !enum_exists($class) || ! $class::hasValue($data)) {
            return $default;
        }
        $value = $class::tryFrom($data);
        return $value->value;
    }
}
