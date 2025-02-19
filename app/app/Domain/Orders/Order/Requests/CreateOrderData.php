<?php

namespace App\Domain\Orders\Order\Requests;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class CreateOrderData extends Data
{
    public function __construct(

        #[Max(100), Min(5)]
        public string $name,

        #[Numeric, Min(0), Max(999.99)]
        public float $amount = 0,

        #[MapOutputName('is_adult')]
        public bool|Optional $isAdult = true,
    ) {
    }
}