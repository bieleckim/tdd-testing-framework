<?php

namespace TestingFramework;

class SetUpExceptionCase extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        throw new \Exception();
    }

    public function testA()
    {
    }

    public function testB()
    {
    }

}
