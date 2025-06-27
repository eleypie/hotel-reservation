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
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $receptionist = Role::create(['name' => 'Receptionist']);
        $user = Role::create(['name' => 'User']);

        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-booking',
            'delete-booking',
            'add-room',
            'edit-room'
        ]);

        $receptionist->givePermissionTo([
            'create-booking',
            'delete-booking',
            'add-room',
            'edit-room'
        ]);

        $user->givePermissionTo([
            'create-booking'
        ]);
    }
}
