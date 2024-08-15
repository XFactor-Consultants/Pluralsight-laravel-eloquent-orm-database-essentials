<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EntriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('entries')->insert([
                'user_entry_id' => $faker->numberBetween(1, 2),
                'job_id' => $faker->numberBetween(1, 4),
                'entry_date' => $faker->dateTimeThisYear(),
                'hours' => ($faker->numberBetween(10, 250)) / 10,
                'description' => $faker->text(20),
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
            ]);
        }
    }
}
