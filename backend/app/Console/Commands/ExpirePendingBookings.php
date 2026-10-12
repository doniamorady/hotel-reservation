<?php

namespace App\Console\Commands;

use App\Services\BookingService;
use Illuminate\Console\Command;

class ExpirePendingBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire pending bookings after payment timeout';
    /**
     * Execute the console command.
     */
    public function handle(BookingService $bookingService)
    {
        $count = $bookingService->expirePendingBookings();
        $this->info("$count bookings expired.");
    }
}
