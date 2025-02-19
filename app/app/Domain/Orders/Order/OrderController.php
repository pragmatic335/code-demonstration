<?php

namespace App\Domain\Orders\Order;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Domain\Orders\Order\Facades\OrderFacade;
use App\Domain\Orders\Order\Requests\CreateOrderData;
use Illuminate\Foundation\Validation\ValidatesRequests;

class OrderController extends Controller
{
    use ValidatesRequests;
    public function create(CreateOrderData $orderData): Resources\OrderResource
    {
        return OrderFacade::create($orderData);
    }
}