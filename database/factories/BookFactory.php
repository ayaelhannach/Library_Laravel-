<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'titre' => $this->faker->sentence,
            'auteur' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'genre' => $this->faker->word,
            'image' => $this->faker->imageUrl(),
            'prix' => $this->faker->randomFloat(2, 5, 100),
            'quantite' => $this->faker->numberBetween(1, 10),
        ];
    }
}
