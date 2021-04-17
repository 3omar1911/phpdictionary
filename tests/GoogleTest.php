<?php

namespace Omarayman\Dictionary\Tests;

use Omarayman\Dictionary\Config;
use Omarayman\Dictionary\Sample;
use Omarayman\Dictionary\Dictionary;

class GoogleTest extends TestCase
{
    private $lang = 'en';
    private $providerName = 'google';

    public function test_valid_nouns()
    {
        $result = Dictionary::fetch("athlete", $this->lang, $this->providerName)->nouns();
        $this->assertFalse(empty($result));
    }

    public function test_valid_verbs()
    {
        $result = Dictionary::fetch("move", $this->lang, $this->providerName)->verbs();
        $this->assertFalse(empty($result));
    }

    public function test_valid_adjectives()
    {
        $result = Dictionary::fetch("coding", $this->lang, $this->providerName)->adjectives();
        $this->assertFalse(empty($result));
    }

    public function test_invalid_adjectives_retuns_empty_array()
    {
        $result = Dictionary::fetch("somewrongword", $this->lang, $this->providerName)->adjectives();
        $this->assertTrue(count($result) == 0);
    }
}
