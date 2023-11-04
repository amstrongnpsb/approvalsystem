<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // admin
        $adminPermission = [
            'create user',
            'edit user',
            'delete user',
            'view user'
        ];
        foreach ($adminPermission as $permission) {
            Permission::create(['name' => $permission]);
        }

        // project
        $projectPermission = [
            'view data',
            'create data',
            'edit data',
            'delete data',
        ];
        foreach ($projectPermission as $permission) {
            Permission::create(['name' => $permission]);
        }


        // create roles and assign existing permissions
        $admin = Role::create(['name' => 'admin']);
        foreach ($adminPermission as $permission) {
            $admin->givePermissionTo($permission);
        }
        $projectAdmin = Role::create(['name' => 'project-admin']);
        foreach ($projectPermission as $permission) {
            $projectAdmin->givePermissionTo($permission);
        }

        $projectManager = Role::create(['name' => 'project-manager']);
        $projectManager->givePermissionTo('view data');

        Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create users
        $users = [
            [
                'name' => 'superadmin',
                'nik' => '128556328',
                'role' => 'Super-Admin'
            ],
            [
                'name' => 'admin',
                'nik' => '174346328',
                'role' => 'admin'
            ],
            [
                'name' => 'amstrong nugraha',
                'nik' => '637589589',
                'role' => 'project-admin'
            ],
            [
                'name' => 'candra pratama',
                'nik' => '957837682',
                'role' => 'project-manager'
            ]
        ];
        foreach ($users as $user) {
            $name = str_replace(' ', '', $user['name']);

            User::factory()->create([
                'name' => $user['name'],
                'email' => $name . '@gmail.com',
                'username' => $user['name'],
                'nik' => $user['nik'],
                'password' => Hash::make('password'),
            ])->assignRole($user['role']);
        }
    }
}
