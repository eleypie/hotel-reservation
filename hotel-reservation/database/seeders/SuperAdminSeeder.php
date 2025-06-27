<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'first_name' => 'Sample',
            'last_name' => 'Super Admin',
            'email' => 'sample@gmail.com',
            'password' => Hash::make('1234'),
        ]);

        $superAdmin->assignRole('Super Admin');
    }
}
