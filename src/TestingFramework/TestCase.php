<?php

namespace TestingFramework;

class TestCase
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function run(): TestResult
    {
        $result = new TestResult();
        $result->testStarted();

        $this->setUp();

        try {
            $this->{$this->name}();
        } catch (\Exception $e) {
            $result->testFailed();
        }

        $this->tearDown();

        return $result;
    }

    public function setUp(): void
    {
    }

    public function tearDown(): void
    {
    }

    public function assertTrue($expression): bool
    {
        if (true !== $expression) {
            throw new \Exception();
        }

        return true;
    }
}
