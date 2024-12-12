<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class movie extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cinemas = DB::table('cinemas')->pluck('id')->toArray();
        
        for ($i = 0; $i < 500; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->sentence,
                'director' => $faker->name,
                'release_date' => $faker->date,
                'duration' => $faker->numberBetween(60, 240),
                'cinema_id' => $faker->randomElement($cinemas),
            ]);
        }
    }
}
