<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_info')->insert([
            'user_id' => User::factory()->create([
                'name' => 'Normal User',
                'email' => 'user@example.com',
            ])->id,
            'admin' => false
        ]);

        DB::table('user_info')->insert([
            'user_id' => User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
            ])->id,
            'admin' => true
        ]);
    }
}
