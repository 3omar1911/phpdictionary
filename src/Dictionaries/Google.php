<?php

namespace Omarayman\Dictionary\Dictionaries;

use Exception;
use GuzzleHttp\Client;
use Omarayman\Dictionary\Contracts\DictionaryInterface;

class Google implements DictionaryInterface
{
    private $meanings = null;
    private $nouns = [];
    private $verbs = [];
    private $adjectives = [];

    public function __call($method, $arguments)
    {
        if($method == 'build') {
            return;
        }

        if($this->meanings === null) {
            throw new Exception("No response has been fetched yet from google api");
        }
    }

    public function build(string $text, string $languageIsoCode = 'en'): DictionaryInterface
    {
        $client = new Client();
        $response = $client->request('get', "https://api.dictionaryapi.dev/api/v2/entries/$languageIsoCode/$text");
        $apiResponse = json_decode($response->getBody()->getContents());
        $this->mergeMeanings($apiResponse);
        $this->mapMeanings();
        return $this;
    }

    private function mergeMeanings($apiResponse)
    {
        $this->meanings = [];
        foreach($apiResponse as $obj) {
            foreach($obj->meanings as $meaning) {
                array_push($this->meanings, $meaning);
            }
        }
    }

    /**
     * populate the data in the meanings array to the class properties (nouns, verbs, adjectives, ...) 
     */
    public function mapMeanings()
    {
        $map = [
            'noun' => &$this->nouns,
            'verb' => &$this->verbs,
            'transitive verb' => &$this->verbs,
            'adjective' => &$this->adjectives,
        ];
        
        foreach($this->meanings as $meaning) {
            if(! isset($map[$meaning->partOfSpeech])) {
                continue;
            }

            foreach($meaning->definitions as $definition) {
                array_push($map[$meaning->partOfSpeech], $definition->definition);
            }
        }
    }

    public function nouns(): array
    {
        return $this->nouns;
    }

    public function verbs(): array
    {
        return $this->verbs;
    }

    public function adjectives(): array
    {
        return $this->adjectives;
    }
}