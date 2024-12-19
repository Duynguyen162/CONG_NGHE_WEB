<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class computer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word . '-' . $faker->numberBetween(1, 100),
                'model' => $faker->company . ' ' . $faker->word,
                'operating_system' => $faker->randomElement(['Windows 10', 'Windows 11', 'Ubuntu']),
                'processor' => $faker->randomElement(['Intel Core i3', 'Intel Core i5', 'Intel Core i7']),
                'memory' => $faker->numberBetween(4, 32),
                'available' => $faker->boolean,
            ]);
        }
    }
}
