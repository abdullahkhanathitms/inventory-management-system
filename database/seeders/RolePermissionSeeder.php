<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Clear permission cache
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        $permissions = [
            'view products',
            'create products',
            'edit products',
            'delete products',
            'restore products',
            'view categories',
            'create categories',
            'edit categories',
            'delete categories',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // Create Roles
        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $manager = Role::firstOrCreate([
            'name' => 'manager',
            'guard_name' => 'web',
        ]);

        $staff = Role::firstOrCreate([
            'name' => 'staff',
            'guard_name' => 'web',
        ]);

        // Assign Permissions to Roles
        $admin->syncPermissions($permissions);

        $manager->syncPermissions([
            'view products',
            'create products',
            'edit products',
            'view categories',
            'create categories',
            'edit categories',
        ]);

        $staff->syncPermissions([
            'view products',
        ]);
    }
}
