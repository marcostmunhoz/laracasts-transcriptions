<?php

namespace MarcosTMunhoz\LaracastsTranscriptions;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

/**
 * @implements IteratorAggregate<int, Line>
 */
class LineCollection implements IteratorAggregate, Countable
{
    /**
     * @param Line[] $items
     */
    public function __construct(public array $items) {}

    public function toHtml(): string
    {
        return implode(
            "\n",
            array_map(
                fn (Line $line) => $line->toHtml(),
                $this->items
            )
        );
    }

    /**
     * @return Traversable<int, Line>|Line[]
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }
}
