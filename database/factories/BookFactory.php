<?php

namespace Database\Factories;

use App\Enums\BookStatusEnum;
use App\Models\ClassificationBook;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $classification_ids = ClassificationBook::all()->pluck('id')->toArray();
        $status = BookStatusEnum::names();

        return [
            'classification_id' => $this->faker->randomElement($classification_ids),
            'name'              => 'O Diário de Vampiro: ' . $this->faker->numberBetween(0, 7),
            'author'            => $this->faker->name,
            'status'            => $this->faker->randomElement($status)
        ];
    }
}
