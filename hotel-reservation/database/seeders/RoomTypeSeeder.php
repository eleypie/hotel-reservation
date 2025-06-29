<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('room_types')->insert([
            [
                'room_type' => 1,
                'room_name' => 'Deluxe',
                'price' => 3200.00,
                'max_guests' => 2,
            ],
            [
                'room_type' => 2,
                'room_name' => 'Superior',
                'price' => 3800.00,
                'max_guests' => 2,
            ],
            [
                'room_type' => 3,
                'room_name' => 'Premier',
                'price' => 4500.00,
                'max_guests' => 3,
            ],
            [
                'room_type' => 4,
                'room_name' => 'Family Suite',
                'price' => 6800.00,
                'max_guests' => 4,
            ],
            [
                'room_type' => 5,
                'room_name' => 'Executive Suite',
                'price' => 7500.00,
                'max_guests' => 2,
            ],
            [
                'room_type' => 6,
                'room_name' => 'Honeymoon Suite',
                'price' => 8200.00,
                'max_guests' => 2,
            ],
        ]);
    }
}
