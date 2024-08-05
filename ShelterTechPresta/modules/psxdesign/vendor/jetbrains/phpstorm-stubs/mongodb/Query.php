<?php

namespace MongoDB\Driver;

use MongoDB\Driver\Exception\InvalidArgumentException;

/**
 * The MongoDB\Driver\Query class is a value object that represents a database query.
 * @link https://php.net/manual/en/class.mongodb-driver-query.php
 */
final class Query
{
    /**
     * Construct new Query
     * @link https://php.net/manual/en/mongodb-driver-query.construct.php
     * @param array|object $filter The search filter.
     * @param array $options
     * @throws InvalidArgumentException on argument parsing errors.
     */
    final public function __construct($filter, ?array $options = []) {}

    final public function __wakeup() {}
}
