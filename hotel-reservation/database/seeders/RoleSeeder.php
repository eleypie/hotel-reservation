<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $receptionist = Role::create(['name' => 'Receptionist']);
        $user = Role::create(['name' => 'User']);

        $superAdmin->givePermissionTo([
            'create-role',
            'edit-role',
            'delete-role',
            'view-user',
            'create-user',
            'edit-user',
            'delete-user',
            'create-booking',
            'delete-booking',
            'edit-booking',
            'view-room',
            'add-room',
            'edit-room',
            'view-admin-site',
            'manage-permissions'
        ]);

        $admin->givePermissionTo([
            'create-booking',
            'delete-booking',
            'edit-booking',
            'view-room',
            'add-room',
            'edit-room',
            'view-admin-site'
        ]);

        $receptionist->givePermissionTo([
            'create-booking',
            'delete-booking',
            'edit-booking',
            'view-room',
            'view-admin-site'
        ]);

        $user->givePermissionTo([
            'create-booking'
        ]);
    }
}
