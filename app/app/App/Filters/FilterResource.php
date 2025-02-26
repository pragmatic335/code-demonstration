<?php

namespace App\App\Filters;

use Countable;

final class FilterResource
{
    public function __construct(
        public private(set) int $total,
        public Countable $collection {
            set(Countable $collection){
                $this->collection = $collection;
                $this->total = $this->total ?? count($collection);
            }
        }
    ) {
    }
}
