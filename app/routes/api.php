<?php

use Illuminate\Support\Facades\Route;
use App\Domain\Orders\Order\OrderController;

Route::controller(OrderController::class)
    ->prefix('order')
    ->as('order.')
    ->group(function () {
        Route::post('/', 'create')->name('create');
        Route::delete('/{coupon}', 'delete')->name('delete');
        Route::get('/{coupon}', 'show')->name('show');
    });

