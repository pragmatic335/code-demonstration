<?php

namespace App\Domain\Orders\Order\Services;

use App\Domain\Orders\Order\Order;
use App\Domain\Orders\Order\Resources\OrderResource;
use App\Domain\Orders\Order\Requests\CreateOrderData;
use App\Domain\Orders\Order\Events\OrderCreatedEvent;

final class OrderService
{
    public function create(CreateOrderData $orderData): OrderResource
    {
        $this->someWork();

        $newOrder = Order::create($orderData->toArray());
        OrderCreatedEvent::dispatch($newOrder);

        return OrderResource::from($newOrder);
    }

    public function delete(Order $order): void
    {
        $this->someWork();

        $order->delete();
    }

    private function someWork(): void
    {

    }
}