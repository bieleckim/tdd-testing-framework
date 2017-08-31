<?php

use TestingFramework\SetUpExceptionCase;
use TestingFramework\TestCase;
use TestingFramework\TestResult;
use TestingFramework\WasRun;
use TestingFramework\TestSuite;

class TestCaseTest extends TestCase
{
    /**
     * @var TestResult
     */
    protected $result;

    public function setUp(): void
    {
        parent::setUp();
        $this->result = new TestResult();
    }

    public function testTemplateMethod(): void
    {
        $test = new WasRun('testMethod');
        $test->run($this->result);
        $this->assertTrue($test->log === 'setUp testMethod tearDown ');
    }

    public function testResult(): void
    {
        $test   = new WasRun('testMethod');
        $test->run($this->result);
        $this->assertTrue('1 run, 0 failed' === $this->result->summary());
    }

    public function testFailedResult(): void
    {
        $test = new WasRun('testBrokenMethod');
        $test->run($this->result);
        $this->assertTrue('1 run, 1 failed' === $this->result->summary());
    }

    public function testFailedResultFormatting(): void
    {
        $this->result->testStarted();
        $this->result->testFailed();
        $this->assertTrue('1 run, 1 failed' === $this->result->summary());
    }

    public function testSuite(): void
    {
        $suite = new TestSuite();
        $suite->add(new WasRun('testMethod'));
        $suite->add(new WasRun('testBrokenMethod'));
        $suite->run($this->result);
        $this->assertTrue('2 run, 1 failed' === $this->result->summary());
    }

    public function testSuiteBasedOnTestCase(): void
    {
        $suite = new TestSuite(WasRun::class);
        $suite->run($this->result);
        $this->assertTrue('2 run, 1 failed' === $this->result->summary());
    }

    public function testFailedSetUp(): void
    {
        $suite = new TestSuite(SetUpExceptionCase::class);
        $suite->run($this->result);
        $this->assertTrue('2 run, 2 failed' === $this->result->summary());
    }

}