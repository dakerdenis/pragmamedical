<?php

namespace App\Helpers;

class TranslationHelper
{
    private static ?array $translations = null;

    public static function load(): array
    {
        if (self::$translations === null) {
            $path = storage_path('app/translations.json');
            self::$translations = file_exists($path)
                ? json_decode(file_get_contents($path), true) ?? []
                : [];
        }
        return self::$translations;
    }

    public static function get(string $key, string $lang, string $fallback = ''): string
    {
        $all = self::load();
        return $all[$key][$lang] ?? $all[$key]['az'] ?? $fallback;
    }

    public static function all(): array
    {
        return self::load();
    }

    public static function save(array $data): void
    {
        file_put_contents(
            storage_path('app/translations.json'),
            json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
        );
        self::$translations = null; // reset cache
    }
}