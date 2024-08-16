<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_codes')->insert([
            [
                'name' => 'Client 1 - Consulting',
                'billing_code' => 'C10001',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => date('Y/m/d H:i:s'),
            ],
            [
                'name' => 'Client 1 - Programming',
                'billing_code' => 'C10002',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => date('Y/m/d H:i:s'),
            ],
            [
                'name' => 'Client 2 - Consulting',
                'billing_code' => 'C20001',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => date('Y/m/d H:i:s'),
            ],
            [
                'name' => 'Client 2 - Programming',
                'billing_code' => 'C20002',
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => date('Y/m/d H:i:s'),
            ],
        ]);
    }
}