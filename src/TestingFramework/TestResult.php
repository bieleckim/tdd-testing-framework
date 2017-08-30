<?php

namespace TestingFramework;

class TestResult
{
    private $runCount;
    private $errorCount;

    public function __construct()
    {
        $this->runCount = 0;
        $this->errorCount = 0;
    }

    public function testStarted(): void
    {
        $this->runCount++;
    }

    public function testFailed()
    {
        $this->errorCount++;
    }

    public function summary(): string
    {
        return sprintf('%d run, %d failed', $this->runCount, $this->errorCount);
    }

}
