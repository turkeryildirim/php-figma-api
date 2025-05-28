<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

trait EnumArrayTrait
{
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function asArray(): array
    {
        if (empty(self::values())) {
            return self::names();
        }

        if (empty(self::names())) {
            return self::values();
        }

        return array_column(self::cases(), 'value', 'name');
    }

    public static function hasValue(mixed $value): bool
    {
        return in_array($value, self::values());
    }

    public static function hasName(string $name): bool
    {
        return in_array($name, self::names());
    }
}
