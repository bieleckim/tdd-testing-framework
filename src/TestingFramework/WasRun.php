<?php

namespace TestingFramework;

class WasRun extends TestCase
{
    public $wasRun;

    public function testMethod(): void
    {
        $this->wasRun = true;
    }
}
