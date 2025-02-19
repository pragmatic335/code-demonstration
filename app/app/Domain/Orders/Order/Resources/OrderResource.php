<?php

namespace App\Domain\Orders\Order\Resources;

use Spatie\LaravelData\Data;
use App\Domain\Orders\Order\Order;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class OrderResource extends Data
{
    public function __construct(
        public string $name,
        public float $amount,
        public bool $isAdult = true,
    ) {
    }

    public static function fromModel(Order $order): static
    {
        return new static(
            name: $order->name,
            amount: $order->amount,
            isAdult: $order->is_adult
        );
    }
}