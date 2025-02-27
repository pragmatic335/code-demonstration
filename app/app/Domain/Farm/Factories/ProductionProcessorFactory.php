<?php

namespace App\Domain\Farm\Factories;

use App\Domain\Farm\Enums\ProductionTypeEnum;
use App\Domain\Farm\Products\EggProduct;
use App\Domain\Farm\Products\MilkProduct;
use App\Domain\Farm\Products\ProductInterface;
use InvalidArgumentException;

class ProductionProcessorFactory
{
    public function createFromType(ProductionTypeEnum $type): ProductInterface
    {
        return match ($type) {
            ProductionTypeEnum::Milk => app(MilkProduct::class),
            ProductionTypeEnum::Egg => app(EggProduct::class),
            default => throw new InvalidArgumentException("Unknown production type: {$type->value}")
        };
    }
}
