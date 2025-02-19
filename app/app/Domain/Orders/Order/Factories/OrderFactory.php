<?php

namespace App\Domain\Orders\Order\Factories;

use App\Domain\Orders\Order\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;
    public function definition(): array
    {
        return [
            'name' => fake()->word,
            'is_adult' => fake()->boolean,
            'amount' => fake()->numberBetween(100,5000),
        ];
    }
}
