<?php

namespace Database\Factories;

use App\Enums\BorrowingStatusEnum;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BorrowingBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userId = User::first()->id;
        $bookId = Book::first()->id;

        return [
            'user_id'     => $userId,
            'book_id'     => $bookId,
            'devolution'  => $this->faker->dateTime,
            'status'      => BorrowingStatusEnum::fromName('OPEN')
        ];
    }
}
