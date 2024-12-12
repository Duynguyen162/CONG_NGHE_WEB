<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class sale extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $medicines = DB::table('medicines')->pluck('medicine_id')->toArray();
        
        for ($i = 0; $i < 500; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->randomElement($medicines),
                'quantity' => $faker->numberBetween(1, 10),
                'sale_date' => $faker->dateTime,
                'customer_phone' => $faker->phoneNumber,
            ]);
        }
    }
}
