<?php

namespace App\Domain\Orders\Order\Facades;

use App\Domain\Orders\Order\Order;
use Illuminate\Support\Facades\Facade;
use App\Domain\Orders\Order\Services\OrderService;
use App\Domain\Orders\Order\Resources\OrderResource;
use App\Domain\Orders\Order\Requests\CreateOrderData;

/**
 * @method static OrderResource create(CreateOrderData $data)
 * @method static OrderResource delete(Order $data)
 *
 * @see OrderService
 */
class OrderFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'order';
    }
}