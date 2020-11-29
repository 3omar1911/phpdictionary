<?php

namespace Omarayman\Dictionary\Factories;

use Omarayman\Dictionary\Contracts\FactoriesInterface;
use Omarayman\Dictionary\Exceptions\UnknownDictionaryProviderException;

class DictionaryFactory implements FactoriesInterface
{
    private $provider;

    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    public function generateInstance(): object
    {
        $class = "\\Omarayman\\Dictionary\\Dictionaries\\" . ucfirst($this->provider);

        if(! class_exists($class)) {
            throw new UnknownDictionaryProviderException("unknown provider: {$this->provider}");
        }

        return new $class;
    }
}