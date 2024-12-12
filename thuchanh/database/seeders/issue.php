<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class issue extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $computers = DB::table('computers')->pluck('id')->toArray();
        
        for ($i = 0; $i < 500; $i++) {
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computers),
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTime,
                'description' => $faker->sentence,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
            ]);
        }
    }
}
