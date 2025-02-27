<?php

namespace App\Domain\Farm\Animals;

use App\Domain\Farm\Factories\ProductionProcessorFactory;
use App\Domain\Farm\Enums\ProductionTypeEnum;

abstract class Animal
{

    public function __construct(
        public protected(set) string $id
    )
    {
    }

    public function produce(ProductionTypeEnum ...$productionType): array
    {
        $productProduced = [];

        foreach($productionType as $type) {
            $processor = app(ProductionProcessorFactory::class)->createFromType($type);
            $productProduced[$type->value] = $processor->produce();
        }

        return $productProduced;
    }
}



