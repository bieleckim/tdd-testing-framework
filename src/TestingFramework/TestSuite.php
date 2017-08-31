<?php

namespace TestingFramework;

class TestSuite
{
    /**
     * @var TestCase[]
     */
    private $tests = [];

    public function __construct($className = null)
    {
        if (null !== $className) {
            $methods = get_class_methods($className);
            foreach ($methods as $method) {
                if (0 === strpos($method, 'test')) {
                    $case = new $className($method);
                    $this->add($case);
                }
            }
        }
    }

    public function add(TestCase $test): void
    {
        $this->tests[] = $test;
    }

    public function run(TestResult &$result): void
    {
        foreach ($this->tests as $test) {
            $test->run($result);
        }
    }

}
