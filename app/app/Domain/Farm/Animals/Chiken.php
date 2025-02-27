<?php

namespace App\Domain\Farm\Animals;

use App\Domain\Farm\Enums\ProductionTypeEnum;

class Chiken extends Animal
{
    /**
     * Добавляем по мере поступления разничные типы продукции
     */
    public CONST PRODUCTS = [ProductionTypeEnum::Egg];
}



