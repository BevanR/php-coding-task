<?php

namespace Util;

/**
 * Trait EmailAddressValidator
 *
 * TODO Is a trait really the right type for this? Perhaps these should just be functions.
 *
 * @package Util
 */
trait EmailAddressValidator
{
    function validEmailAddress($raw): string
    {
        $email = (string)$raw;

        if ($raw === $email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        } else {
            throw new InvalidArgumentException('email address', $raw);
        }
    }
}