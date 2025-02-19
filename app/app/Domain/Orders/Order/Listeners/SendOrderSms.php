<?php

namespace App\Domain\Orders\Order\Listeners;

use App\Domain\Orders\Order\Order;
use App\Domain\Orders\Order\Events\OrderCreatedEvent;

final class SendOrderSms
{
    public function __construct() {}

    public function handle(OrderCreatedEvent $event): void
    {
        $this->someWork($event->order);
    }
    private function someWork(Order $object) : void {

    }
}
