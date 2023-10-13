<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
            'password' => bcrypt('password123'),
            'created_at' => Carbon::now(),
        ]);
    }
}
