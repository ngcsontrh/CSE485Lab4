<?php

namespace Database\Seeders;

use App\Models\Borrow;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            Borrow::create([
                'reader_id' => $faker->numberBetween(1, 10),
                'book_id' => $faker->numberBetween(1, 10),
                'borrow_date' => $faker->date(),
                'return_date' => $faker->date()
            ]);
        }
    }
}
