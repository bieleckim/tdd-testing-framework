<?php

use TestingFramework\TestCase;
use TestingFramework\TestResult;
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

    public function testFailedResultFormatting(): void
    {
        $result = new TestResult();
        $result->testStarted();
        $result->testFailed();
        $this->assertTrue('1 run, 1 failed' === $result->summary());
    }

}

echo (new TestCaseTest('testTemplateMethod'))->run()->summary() . PHP_EOL;
echo (new TestCaseTest('testResult'))->run()->summary() . PHP_EOL;
echo (new TestCaseTest('testFailedResult'))->run()->summary() . PHP_EOL;
echo (new TestCaseTest('testFailedResultFormatting'))->run()->summary() . PHP_EOL;
