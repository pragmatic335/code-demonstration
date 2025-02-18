<?php

namespace App\Domain\Orders\Order;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
class OrderController extends Controller
{
    public function test(): JsonResponse
    {
        return new JsonResponse('hi', 201);
    }
}