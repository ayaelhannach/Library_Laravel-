<?php

namespace Database\Factories;

use App\Models\Useer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UseerFactory extends Factory
{
    protected $model = Useer::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password123'),
            'tel' => $this->faker->phoneNumber(),
            'dateNaissance' => $this->faker->date(),
        ];
    }
}
