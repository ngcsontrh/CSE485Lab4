<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Book::factory()->count(100)->create();
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            Book::create([
                'name' => $faker->name,
                'author' => $faker->name,
                'category' => $faker->sentence(10),
                'year' => $faker->year(),
                'quantity' => $faker->numberBetween(1, 100)
            ]);
        }
    }
}
