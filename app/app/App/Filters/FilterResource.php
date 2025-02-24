<?php

namespace App\App\Filters;

use Countable;

final class FilterResource
{
    public function __construct(
        private int $total,
        private Countable $collection,
    ) {
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getCollection(): mixed
    {
        return $this->collection;
    }

    public function setCollection(
        Countable $collection,
        int $total = null,
    ): void {
        $this->collection = $collection;
        $this->total = $total ?? count($collection);
    }
}