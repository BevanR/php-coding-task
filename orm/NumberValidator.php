<?php

namespace Orm;

require('InvalidSerialIdentifierException.php');

/**
 * Casts values of unknown types to values of known types and constraints.
 *
 * TODO Add more validators for other constraints and types of data.
 *
 * @package Orm
 */
trait NumberValidator
{
    /**
     * @param $raw
     * @return int
     * @throws InvalidSerialIdentifierException
     */
    function validSerialIdentifier($raw): int
    {
        $id = (int)$raw;

        if ($id == $raw && $id >= 1) {
            return $id;
        } else {
            throw new InvalidSerialIdentifierException($raw);
        }
    }
}