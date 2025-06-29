<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [ 'room_id' => 101, 'room_type' => 1 ],
            [ 'room_id' => 102, 'room_type' => 1 ],
            [ 'room_id' => 103, 'room_type' => 1 ],

            [ 'room_id' => 201, 'room_type' => 2 ],
            [ 'room_id' => 202, 'room_type' => 2 ],
            [ 'room_id' => 203, 'room_type' => 2 ],

            [ 'room_id' => 301, 'room_type' => 3 ],
            [ 'room_id' => 302, 'room_type' => 3 ],
            [ 'room_id' => 303, 'room_type' => 3 ],

            [ 'room_id' => 401, 'room_type' => 4 ],
            [ 'room_id' => 402, 'room_type' => 4 ],
            [ 'room_id' => 403, 'room_type' => 4 ],

            [ 'room_id' => 501, 'room_type' => 5 ],
            [ 'room_id' => 502, 'room_type' => 5 ],
            [ 'room_id' => 503, 'room_type' => 5 ],

            [ 'room_id' => 601, 'room_type' => 6 ],
            [ 'room_id' => 602, 'room_type' => 6 ],
            [ 'room_id' => 603, 'room_type' => 6 ],
        ]);
    }
}
