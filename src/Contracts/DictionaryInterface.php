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
     * @return DictionaryInterface
     */
    public function build(string $text, string $languageIsoCode = 'en'): DictionaryInterface;

    /**
     * get the nouns from the api response if exists
     * 
     * @return array
     */
    public function nouns(): array;

    /**
     * get the verbs from the api response if exists
     * 
     * @return array
     */
    public function verbs(): array;

    /**
     * get the adjectives from the api response if exists
     * 
     * @return array
     */
    public function adjectives(): array;
}
