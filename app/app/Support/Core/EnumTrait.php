<?php

namespace App\Support\Core;

trait EnumTrait
{
    public static function toArray(): array
    {
        return self::toArrayProcess(self::cases());
    }

    public static function getValues(): array
    {
        return collect(self::cases())
            ->map(fn($case) => $case->value)
            ->toArray();
    }

    public static function toString(): string
    {
        return implode(',', self::getValues());
    }

    protected static function toArrayProcess(array $cases): array
    {
        return collect($cases)
            ->mapWithKeys(fn($case) => [$case->value => $case])
            ->toArray();
    }

    public static function randomValue(): string|int
    {
        $key = array_rand(self::cases());
        return self::cases()[$key]->value;
    }
}
