<?php

namespace Database\Factories;

use App\Models\OrderBook;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderBookFactory extends Factory
{
    protected $model = OrderBook::class;

    public function definition()
    {
        return [
            'order_id' => \App\Models\Order::factory(),
            'book_id' => \App\Models\Book::factory(),
            'quantite' => $this->faker->numberBetween(1, 3),
        ];
    }
}
