<?php

namespace App\App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use App\Domain\Orders\Order\Services\OrderService;
use App\Domain\Orders\Order\Listeners\SendOrderSms;
use App\Domain\Orders\Order\Events\OrderCreatedEvent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->resolveFacades();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            OrderCreatedEvent::class,
            SendOrderSms::class,
        );
    }

    private function resolveFacades(): void
    {
        $this->app->bind('order', OrderService::class);
    }
}
