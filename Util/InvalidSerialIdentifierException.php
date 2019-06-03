<?php

namespace Util;

use LogicException;

class InvalidArgumentException extends LogicException
{
    public function __construct(string $expectation, $raw)
    {
        // Use var_dump() instead and use a buffer to collect its output.
        $debug = var_export($raw, true);
        $message = "Expected a {$expectation} but got {$debug}";
        parent::__construct($message);
    }
}