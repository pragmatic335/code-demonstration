<?php

namespace App\Domain\Farm\Animals;

use App\Domain\Farm\Enums\ProductionTypeEnum;

class Cow extends Animal
{
    /**
     * Добавляем по мере поступления разничные типы продукции
     */
    public CONST PRODUCTS = [ProductionTypeEnum::Milk];
}



