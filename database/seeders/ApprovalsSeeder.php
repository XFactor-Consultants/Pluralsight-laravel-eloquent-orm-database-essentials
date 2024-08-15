<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ApprovalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            if ($faker->numberBetween(0,1) == 1) {
                DB::table('approvals')->insert([
                    'user_id' => 1,
                    'entries_id' => $index,
                    'created_at' => $faker->dateTimeThisYear(),
                    'updated_at' => $faker->dateTimeThisYear(),
                ]);
            }
        }
    }
}
