<?php

namespace Database\Seeders;

use App\Models\BorrowingBook;
use Illuminate\Database\Seeder;

class BorrowingBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BorrowingBook::factory()->create();
    }
}
