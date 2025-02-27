<?php

namespace App\Domain\Farm\Enums;

use App\Support\Core\EnumTrait;
enum ProductionTypeEnum: string
{
    use EnumTrait;

    case Milk = 'milk';

    case Egg = 'egg';
}
