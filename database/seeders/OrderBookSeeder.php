<?php

namespace Database\Seeders;

use App\Models\OrderBook;
use Illuminate\Database\Seeder;

class OrderBookSeeder extends Seeder
{
    public function run()
    {
        OrderBook::factory(20)->create(); 
    }
}
