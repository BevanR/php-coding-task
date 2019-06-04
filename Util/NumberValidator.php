<?php

namespace Util;

require_once('InvalidArgumentException.php');

/**
 * Casts values of unknown types to values of known types and constraints.
 *
 * @package Util
 */
trait NumberValidator
{
    function validSerialIdentifier($raw): int
    {
        return $this->validPositiveInteger($raw);
    }

    function validInteger($raw): int
    {
        return $this->integerValidator($raw, 'integer', function ($value) {
            return true;
        });
    }

    function validPositiveInteger($raw): int
    {
        return $this->integerValidator($raw, 'positive integer', function ($value) {
            return $value > 0;
        });
    }

    function validNonNegativeInteger($raw): int
    {
        return $this->integerValidator($raw, 'non-negative integer', function ($value) {
            return $value >= 0;
        });
    }

    function validIntegerInRange($raw, int $min, int $max): int
    {
        return $this->integerValidator($raw, "integer in range [$min, $max]", function ($value) use ($max, $min) {
            return $value >= $min && $value <= $max;
        });
    }

    private function integerValidator($raw, $expectation, $comparator): int
    {
        if (is_numeric($raw)) {
            $integer = (int)$raw;

            if ($integer == $raw && $comparator($integer)) {
                return $integer;
            }
        }

        throw new InvalidArgumentException($expectation, $raw);
    }
}