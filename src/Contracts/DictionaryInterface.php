<?php

namespace Omarayman\Dictionary\Contracts;

/**
 * Interface  DictionaryInterface
 *
 * @author   Omar Ayman  <oa36345@gmail.com>
 */
interface DictionaryInterface
{
    /**
     * Build the dictionary object
     * 
     * @param string $text
     * @param string $languageIsoCode
     */
    public function build(string $text, string $languageIsoCode = 'en'): DictionaryInterface;

    /**
     * Reset the object to its original state
     */
    public function reset(): DictionaryInterface;
    /**
     * get the nount from the api response if exists
     * 
     * @return string|null
     */
    public function noun();

    /**
     * get the verb from the api response if exists
     * 
     * @return string|null
     */
    public function verb();

    /**
     * get the adjective from the api response if exists
     * 
     * @return string|null
     */
    public function adjective();
}
