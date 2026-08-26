<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        DB::table('beds')->insert([
            ['type' => 'queen', 'capacity' => 1],
            ['type' => 'king', 'capacity' => 1],
            ['type' => 'double', 'capacity' => 2],
        ]);

        DB::table('rooms')->insert([
            ['name' => '001', 'price' => 200000, 'status' => true, 'capacity' => 2],
            ['name' => '002', 'price' => 500000, 'status' => false, 'capacity' => 2],
            ['name' => '003', 'price' => 250000, 'status' => true, 'capacity' => 3],
            ['name' => '004', 'price' => 300000, 'status' => false, 'capacity' => 1],
            ['name' => '005', 'price' => 1200000, 'status' => true, 'capacity' => 1],
        ]);

        // simple fixed bed-room assignments (bed_room pivot)
        DB::table('bed_room')->insert([
            ['bed_id' => 1, 'room_id' => 1],
            ['bed_id' => 2, 'room_id' => 1],
            ['bed_id' => 3, 'room_id' => 2],
            ['bed_id' => 1, 'room_id' => 3],
            ['bed_id' => 3, 'room_id' => 3],
            ['bed_id' => 2, 'room_id' => 4],
            ['bed_id' => 1, 'room_id' => 5],
        ]);


        DB::table('bookings')->insert([
            [
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(3),
                'user_id' => 1,
                'room_id' => 1,
                'num_nights' => 2,
                'status' => 'unconfirmed',
                'num_guests' => 3,
                'has_breakfast' => true,
                'breakfast_unit_price' => 150000,
                'total_breakfast_price' => 900000,

                'room_unit_price' => 1235000,
                'total_room_price' => Room::findOrFail(1)->price * 2,

                'total_price' => 2135000
            ],
            [
                'start_date' => Carbon::now()->subDays(3),
                'end_date' => Carbon::now()->addDays(2),
                'user_id' => 2,
                'room_id' => 2,
                'num_nights' => 5,
                'status' => 'checked_in',
                'num_guests' => 1,
                'has_breakfast' => false,
                'breakfast_unit_price' => 150000,
                'total_breakfast_price' => 0,
                'room_unit_price' => Room::findOrFail(2)->price,
                'total_room_price' => Room::findOrFail(2)->price * 5,
                'total_price' => 1235000
            ],
        ]);

        DB::table('settings')->insert([
            'breakfast_unit_price' => 150000,
            'max_nights' => 10,
            'max_guests' => 5,
        ]);
    }
}
