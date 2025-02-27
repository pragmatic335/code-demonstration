<?php

namespace App\Domain\Farm\Products;

interface ProductInterface
{
    public function produce(): mixed;
}
