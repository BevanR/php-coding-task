<?php

class TestFailedException extends Exception
{
    public function __construct(string $expectation, $value)
    {
        // Use var_dump() instead and use a buffer to collect its output.
        $debug = var_export($value, true);
        $message = "Expected {$expectation} for {$debug}";
        parent::__construct($message);
    }
}