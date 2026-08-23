<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
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
            ['name' => '001', 'status' => true],
            ['name' => '002', 'status' => false],
            ['name' => '003', 'status' => true],
            ['name' => '004', 'status' => false],
            ['name' => '005', 'status' => true],
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
                'breakfast_price' => 200000,
                'room_price' => 1235000,
                'total_price' => 1435000
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
                'breakfast_price' => 0,
                'room_price' => 1235000,
                'total_price' => 1235000
            ],
        ]);

        DB::table('settings')->insert([
            'breakfast_price' => 150000,
            'max_nights' => 10,
            'max_guests' => 5,
        ]);
    }
}
