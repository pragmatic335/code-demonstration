<?php

namespace App\Domain\Farm\Products;


class MilkProduct implements ProductInterface
{
    public function produce():mixed
    {
        return fake()->numberBetween(8,12);
    }
}
