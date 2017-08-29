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

    public function testResult(): void
    {
        $test   = new WasRun('testMethod');
        $result = $test->run();
        $this->assertTrue('1 run, 0 failed' === $result->summary());
    }

    public function testFailedResult(): void
    {
        $test = new WasRun('testBrokenMethod');
        $result = $test->run();
        $this->assertTrue('1 run, 1 failed' === $result->summary());
    }

}

(new TestCaseTest('testTemplateMethod'))->run();
(new TestCaseTest('testResult'))->run();
(new TestCaseTest('testFailedResult'))->run();
