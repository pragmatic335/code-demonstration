<?php

namespace Tests\Feature\Orders\Order;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\DataProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Domain\Orders\Order\Events\OrderCreatedEvent;

class OrderControllerStoreTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Event::fake(OrderCreatedEvent::class);
    }

    public function testCorrectMethodStore(): void
    {
        $correctInput = ['name' => 'красивые мандарины', 'amount' => 999];

        $response = $this->post(route('order.create'), $correctInput);

        Event::assertDispatched(OrderCreatedEvent::class);

        $response->assertCreated();
    }

    public function testIncorrectMethodStore(): void
    {
        $incorrectInput = [];

        $response = $this->post(route('order.create'), $incorrectInput);

        Event::assertNotDispatched(OrderCreatedEvent::class);

        $response->assertUnprocessable();
    }

    #[dataProvider('casesDataProvider')]
    public function testCorrectMethodStoreWithParams($name, $amount, $isAdult): void
    {
        $correctInput = ['name' => $name, 'amount' => $amount, 'isAdult' => $isAdult];

        $response = $this->post(route('order.create'), $correctInput);

        Event::assertDispatched(OrderCreatedEvent::class);

        $response->assertCreated();

        $response->assertJsonFragment(
            [
                'name' => $name,
                'amount' => $amount,
                'isAdult' => $isAdult,
            ]
        );
    }

    public static function casesDataProvider(): array
    {
        return [
            ['Укропчик', 123, true],
            ['Огуречик', 888, true],
            ['Помидорчик', 777, false],
            ['Баклажанчик', 444.66, false],
        ];
    }
}