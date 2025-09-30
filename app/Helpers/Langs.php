<?php

namespace App\Helpers;

class Langs
{
    const LOCALES = ['uk', 'ru', 'en', 'ka'];

    public static function getLocale()
    {
        $locale = request()->segment(2, '');
        if (in_array($locale, self::LOCALES)) {
            return $locale;
        }
        return config('app.locale');
    }
}
