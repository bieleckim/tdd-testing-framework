<?php

namespace TestingFramework;

class WasRun extends TestCase
{
    public $log;

    public function setUp(): void
    {
        parent::setUp();
        $this->log = 'setUp ';
    }

    public function testMethod(): void
    {
        $this->log .= 'testMethod ';
    }

    public function tearDown(): void
    {
        $this->log .= 'tearDown ';
    }
}
