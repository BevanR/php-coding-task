<?php
require_once('NumberValidator.php');

use Util\InvalidArgumentException;
use Util\NumberValidator;

/**
 * TODO Use a testing library for better tooling.
 * TODO Organize this into a suite.
 */
class MockNumberValidator
{
    use NumberValidator;
}

$validator = new MockNumberValidator();

// Valid positive integer inputs.
foreach ([1000, '1000', 0x1000, 1, '1'] as $value) {
    $validator->validPositiveInteger($value);
}

// Invalid positive integer inputs.
foreach ([0, '0', -1, '-1', -111, '-111', 12.3, 17 / 3, 0 - 17 / 3] as $value) {
    try {
        $validator->validPositiveInteger($value);
        throw new TestFailedException('InvalidArgumentException', $value);
    } catch (InvalidArgumentException $e) {
        // An InvalidArgumentException is expected for these scenarios.
    }
}

// Valid non-negative integer inputs.
foreach ([0, '0', 1000, '1000', 0x1000, 1, '1'] as $value) {
    $validator->validNonNegativeInteger($value);
}

// Invalid positive integer inputs.
foreach ([-1, '-1', -111, '-111', 12.3, 17 / 3, 0 - 17 / 3, [], 'asdf', false, true] as $value) {
    try {
        $validator->validNonNegativeInteger($value);
        throw new TestFailedException('InvalidArgumentException', $value);
    } catch (InvalidArgumentException $e) {
        // An InvalidArgumentException is expected for these scenarios.
    }
}

// Valid non-negative integer inputs.
foreach ([0, '0', 1000, '1000', 0x1000, 1, '1', -1, '-1', -111, '-111'] as $value) {
    $validator->validInteger($value);
}

// Invalid non-negative integer inputs.
foreach ([12.3, 17 / 3, 0 - 17 / 3, [], 'asdf', false, true] as $value) {
    try {
        $validator->validInteger($value);
        throw new TestFailedException('InvalidArgumentException', $value);
    } catch (InvalidArgumentException $e) {
        // An InvalidArgumentException is expected for these scenarios.
    }
}
