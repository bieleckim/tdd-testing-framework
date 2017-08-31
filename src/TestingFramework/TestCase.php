<?php

namespace TestingFramework;

class TestCase
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function run(TestResult &$result): void
    {
        $result->testStarted();

        try {
            $this->setUp();
            $this->{$this->name}();
        } catch (\Exception $e) {
            $result->testFailed();
        }

        $this->tearDown();
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
