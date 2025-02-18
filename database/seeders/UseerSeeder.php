<?php

namespace Database\Seeders;

use App\Models\Useer;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        Useer::factory(10)->create(); 
    }
}
