<?php

require_once __DIR__ . '/../vendor/autoload.php';

class TestCaseTest extends \TestingFramework\TestCase
{

    public function testRunning(): void
    {
        $test = new \TestingFramework\WasRun('testMethod');
        $this->assertTrue(null === $test->wasRun);
        $test->run();
        $this->assertTrue($test->wasRun);
    }

}

(new TestCaseTest('testRunning'))->run();
