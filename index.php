<?php

require('./vendor/autoload.php');

use Omarayman\Dictionary\Config;
use Omarayman\Dictionary\Dictionary;

dd( Dictionary::fetch("good")->nouns() );

function dd($value)
{
    var_dump($value);
    die;
}