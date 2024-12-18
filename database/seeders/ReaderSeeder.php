<?php

namespace Database\Seeders;

use App\Models\Reader;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            Reader::create([
                'name' => $faker->name,
                'birthday' => $faker->date(),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address
            ]);
        }
    }
}
