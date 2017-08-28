<?php

namespace TestingFramework;

class TestCase
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function run(): void
    {
        $this->setUp();

        try {
            $this->{$this->name}();
            echo ".";
        } catch (\Exception $e) {
            echo $e->getTraceAsString() . PHP_EOL;
        }

        $this->tearDown();
    }

    public function assertTrue($expression): bool
    {
        if (true !== $expression) {
            throw new \Exception();
        }

        return true;
    }

    public function setUp(): void
    {
    }

    public function tearDown(): void
    {
    }
}
