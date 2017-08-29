<?php

namespace TestingFramework;

class TestResult
{
    private $runCount;

    public function __construct()
    {
        $this->runCount = 0;
    }

    public function testStarted(): void
    {
        $this->runCount++;
    }

    public function summary(): string
    {
        return sprintf('%d run, 0 failed', $this->runCount);
    }

}
