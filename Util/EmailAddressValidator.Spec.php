<?php
require_once('EmailAddressValidator.php');

use Util\EmailAddressValidator;
use Util\InvalidArgumentException;

class MockEmailAddressValidator
{
    use EmailAddressValidator;
}

$validator = new MockEmailAddressValidator();

// Valid email addresses.
foreach (['bevan+serato@js.geek.nz', 'bevan@akl.nz', 'noreply@serato.com'] as $value) {
    $validator->validEmailAddress($value);
}

// Invalid email addresses.
foreach (['store @serato.com', '@serato', 'serato', 'ser,ato', 'ser,ato@serato', 'root@localhost', '"Serato" <noreply@serato.com>'] as $value) {
    try {
        $validator->validEmailAddress($value);
        throw new TestFailedException('InvalidArgumentException', $value);
    } catch (InvalidArgumentException $e) {
        // An InvalidArgumentException is expected for these scenarios.
    }
}
