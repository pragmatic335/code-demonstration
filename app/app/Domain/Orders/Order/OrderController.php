<?php

namespace App\Domain\Orders\Order;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use App\Domain\Orders\Order\Facades\OrderFacade;
use App\Domain\Orders\Order\Resources\OrderResource;
use App\Domain\Orders\Order\Requests\CreateOrderData;
use Illuminate\Foundation\Validation\ValidatesRequests;

class OrderController extends Controller
{
    public function create(CreateOrderData $orderData): OrderResource
    {
        return OrderFacade::create($orderData);
    }

    public function delete(Order $order): JsonResponse
    {
        OrderFacade::delete($order);

        return response(status: 204)->json();
    }

    public function show(Order $order): OrderResource
    {
        return OrderResource::from($order);
    }
}