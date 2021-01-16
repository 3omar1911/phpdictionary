<?php

namespace Omarayman\Dictionary;

use Omarayman\Dictionary\Factories\DictionaryFactory;

class Dictionary
{
    public static function fetch($text, $languageIsoCode = "en", $providerName = null)
    {
        $providerName = $providerName?: self::getDefaultProvider();
        return ( new DictionaryFactory($providerName) )->generateInstance()->build($text, $languageIsoCode);
    }

    public static function getDefaultProvider()
    {
        return ( new Config )->get('default');
    }
}