<?php

use Illuminate\Support\Facades\Route;
use App\Domain\Orders\Order\OrderController;

Route::get('test', OrderController::class . '@test');