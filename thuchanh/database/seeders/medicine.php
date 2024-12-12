<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class medicine extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->word,
                'brand' => $faker->company,
                'dosage' => $faker->randomElement(['10mg', '20mg', '30mg']),
                'form' => $faker->randomElement(['Viên nén', 'Viên nang', 'Xi-rô']),
                'price' => $faker->numberBetween(10000, 100000),
                'stock' => $faker->numberBetween(10, 100),
            ]);
        }
    }
}
