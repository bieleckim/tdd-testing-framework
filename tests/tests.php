<?php

use TestingFramework\TestCase;
use TestingFramework\WasRun;

require_once __DIR__.'/../vendor/autoload.php';

class TestCaseTest extends TestCase
{
    /**
     * @var WasRun
     */
    protected $test;

    public function setUp(): void
    {
        parent::setUp();
        $this->test = new WasRun('testMethod');
    }

    public function testRunning(): void
    {
        $this->test->run();
        $this->assertTrue($this->test->wasRun);
    }

    public function testSetUp(): void
    {
        $this->test->run();
        $this->assertTrue($this->test->wasSetUp);
    }

}

(new TestCaseTest('testRunning'))->run();
(new TestCaseTest('testSetUp'))->run();
