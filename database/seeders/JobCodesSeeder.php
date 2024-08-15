<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_codes')->insert([
            [
                'name' => 'Client 1 - Consulting',
                'billing_code' => 'C10001'
            ],
            [
                'name' => 'Client 1 - Programming',
                'billing_code' => 'C10001'
            ],
            [
                'name' => 'Client 2 - Consulting',
                'billing_code' => 'C20001'
            ],
            [
                'name' => 'Client 2 - Programming',
                'billing_code' => 'C20001'
            ]
        ]);
    }
}
