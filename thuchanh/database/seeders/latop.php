<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class latop extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $renters = DB::table('renters')->pluck('id')->toArray();
        
        for ($i = 0; $i < 50; $i++) {
            DB::table('laptops')->insert([
                'brand' => $faker->company,
                'model' => $faker->word,
                'specifications' => $faker->sentence,
                'rental_status' => $faker->boolean,
                'renter_id' => $faker->randomElement($renters),
            ]);
        }
    }
}
