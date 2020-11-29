<?php

namespace Omarayman\Dictionary;

use Omarayman\Dictionary\Factories\DictionaryFactory;

class Dictionary
{
    private static $lastProviderName = null;
    /**
     * @var \Omarayman\Dictionary\Contracts\DictionaryInterface
     */
    private $lastProviderObject = null;

    public static function fetch($text, $languageIsoCode = "en", $providerName = null)
    {
        $providerName = $providerName?: self::getDefaultProvider();
        
        if($providerName == self::$lastProviderName) {
            return (self::$lastProviderObject)->reset()->build($text, $languageIsoCode);
        }

        self::$lastProviderName =  $providerName;
        self::$lastProviderObject = ( new DictionaryFactory($providerName) )->generateInstance();
        return self::$lastProviderObject->build($text, $languageIsoCode);
    }

    public static function getDefaultProvider()
    {
        return ( new Config )->get('default');
    }
}