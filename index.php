<?php

require('./vendor/autoload.php');

use Omarayman\Dictionary\Dictionary;

print_r( Dictionary::fetch("coding")->adjectives() );
die;
function dd($value)
{
    var_dump($value);
    die;
}