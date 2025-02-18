<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Useer;
use App\Models\Book;
use App\Models\Order;
use App\Models\Favorite;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Admin::factory(2)->create();
        Useer::factory(10)->create();
        Book::factory(20)->create();
        Order::factory(10)->create();
        Favorite::factory(30)->create();
    }
}
