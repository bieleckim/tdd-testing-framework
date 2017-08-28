<?php

namespace TestingFramework;

class TestCase
{
    public $name;
    public $wasSetUp;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->wasSetUp = false;
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
}
