<?php

require('./vendor/autoload.php');

use Omarayman\Dictionary\Config;

$conf = new Config();
dd($conf->get('greeting'));