<?php

namespace App\Domain\Orders\Order\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Orders\Order\Order;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Order::factory()->count(10)->create();
    }
}