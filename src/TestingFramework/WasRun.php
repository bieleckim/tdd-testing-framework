<?php

namespace TestingFramework;

class WasRun extends TestCase
{
    public $wasRun;

    public function setUp(): void
    {
        parent::setUp();
        $this->wasRun = false;
        $this->wasSetUp = true;
    }

    public function testMethod(): void
    {
        $this->wasRun = true;
    }
}
