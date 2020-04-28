<?php

/**
 * @license MIT
 * @license http://opensource.org/licenses/MIT
 */

namespace FaaPz\PDO\Clause;

use FaaPz\PDO\QueryInterface;

class Limit implements QueryInterface
{
    /** @var int $first */
    protected $first;

    /** @var int|null $skip */
    protected $skip;

    /**
     * @param int      $first
     * @param int|null $skip
     */
    public function __construct(int $first, int $skip = null)
    {
        $this->first = $first;
        $this->skip = $skip;
    }

    /**
     * @return int[]
     */
    public function getValues(): array
    {
        if ($this->skip !== null) {
            $values = [$this->first, $this->skip];
        } else {
            $values = [$this->first];
        }

        return $values;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $sql = 'FIRST ?';
        if ($this->skip !== null) {
            $sql .= ' SKIP ?';
        }

        return $sql;
    }
}
