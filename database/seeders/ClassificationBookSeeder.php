<?php

namespace Database\Seeders;

use App\Models\ClassificationBook;
use Illuminate\Database\Seeder;

class ClassificationBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classifications = ['Aventura', 'Crônica', 'Drama', 'Fantasia', 'Ficção', 'Romance'];

        foreach ($classifications as $classification) {
            ClassificationBook::create(['classification' => $classification]);
        }
    }
}
