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
        $this->{$this->name}();
    }

    public function assertTrue($expression): bool
    {
        if (true !== $expression) {
            throw new \Exception();
        }

        return true;
    }
}
