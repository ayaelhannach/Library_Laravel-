<?php

namespace Database\Seeders;

use App\Models\Favorite;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    public function run()
    {
        Favorite::factory(30)->create(); 
    }
}
