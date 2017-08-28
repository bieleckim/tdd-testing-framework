<?php

use TestingFramework\TestCase;
use TestingFramework\WasRun;

require_once __DIR__.'/../vendor/autoload.php';

class TestCaseTest extends TestCase
{

    public function testTemplateMethod(): void
    {
        $test = new WasRun('testMethod');
        $test->run();
        $this->assertTrue($test->log === 'setUp testMethod tearDown ');
    }

}

(new TestCaseTest('testTemplateMethod'))->run();
