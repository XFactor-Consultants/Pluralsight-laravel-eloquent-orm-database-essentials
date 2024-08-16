<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_infos')->insert([
            'user_id'=> User::factory()->create([
                'name' => 'Normal User',
                'email' => 'user@example.com'
            ])->id,
            'admin' => false,
            'created_at' => date('Y/m/d H:i:s'),
            'updated_at' => date('Y/m/d H:i:s'),
        ]);

        DB::table('user_infos')->insert([
            'user_id'=> User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@example.com'
            ])->id,
            'admin' => true,
            'created_at' => date('Y/m/d H:i:s'),
            'updated_at' => date('Y/m/d H:i:s'),
        ]);
    }
}
