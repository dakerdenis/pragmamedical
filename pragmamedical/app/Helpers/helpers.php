<?php

use App\Helpers\TranslationHelper;

if (!function_exists('t')) {
    function t(string $key, ?string $lang = null): string
    {
        if ($lang === null) {
            try {
                $lang = app('current_lang');
            } catch (\Throwable $e) {
                $lang = 'az';
            }
        }
        return TranslationHelper::get($key, $lang, $key);
    }
}