<?php

namespace Omarayman\Dictionary\Tests;

use Omarayman\Dictionary\Config;
use Omarayman\Dictionary\Sample;

/**
 * Class SampleTest
 *
 * @category Test
 * @package  Omarayman\Dictionary\Tests
 * @author   Mahmoud Zalt <mahmoud@zalt.me>
 */
class SampleTest extends TestCase
{

    public function testSayHello()
    {
        $config = new Config();
        $sample = new Sample($config);

        $name = 'Mahmoud Zalt';

        $result = $sample->sayHello($name);

        $expected = $config->get('greeting') . ' ' . $name;

        $this->assertEquals($result, $expected);

    }

}
