<?php

namespace App\Domain\Farm\Products;

class EggProduct implements ProductInterface
{
    public function produce():mixed
    {
        return fake()->numberBetween(0,1);
    }
}
