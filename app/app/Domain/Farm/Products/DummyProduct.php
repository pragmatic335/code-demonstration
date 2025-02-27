<?php

namespace App\Domain\Farm\Products;

class DummyProduct implements ProductInterface
{
    public function produce():mixed
    {
        return false;
    }
}
