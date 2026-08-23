<?php

namespace Database\Seeders;

use App\Models\User;
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
            ['start_date' => new Date(), 'end_date'=> new Date()]
        ]);
        
    }
}
