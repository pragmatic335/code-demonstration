<?php

namespace App\Domain\Orders\Order\Events;

use App\Domain\Orders\Order\Order;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class OrderCreatedEvent
{
    use Dispatchable, SerializesModels;

    public function __construct(public Order $order)
    {
    }
}
