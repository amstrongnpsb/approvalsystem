<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $division = [
            'Admin',
            'Procurement',
            'Finance',
            'It Apps',
            'It Infra',
            'Project'
        ];
        foreach ($division as $d){
            Role::create([
                'name' => $d
            ]);
        }
    }
}
