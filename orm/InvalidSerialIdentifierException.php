<?php

namespace Orm;

use Exception;

class InvalidSerialIdentifierException extends Exception
{
    public function __construct($raw)
    {
        // Use var_dump() instead and use a buffer to collect its output.
        $debug = var_export($raw, true);
        $message = "Expected a positive integer but got {$debug}";
        parent::__construct($message);
    }
}