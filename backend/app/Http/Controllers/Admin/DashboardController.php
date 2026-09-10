<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $latestBookings = Booking::latest()->take(10)->get();
        $latestConfirmBooking = Booking::latest()->where('status', 'confirmed')->first()->created_at->diffForHumans();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $pendingBookings = Booking::where('status', 'pending')->count();

        $pendingPercentage =  $pendingBookings / ($pendingBookings + $confirmedBookings);

        $paidStatuses = ['confirmed', 'checked_in', 'checked_out'];

        $thisMonth = Booking::whereIn('status', $paidStatuses)
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month);

        $thisMonthIncome = $thisMonth->sum('total_price');
        $thisMonthRoomIncome = $thisMonth->sum('total_room_price');
        $thisMonthBreakfastIncome = $thisMonth->where('has_breakfast', 1)->sum('total_breakfast_price');

        $lastMonthIncome = Booking::whereIn('status', $paidStatuses)
            ->whereYear('created_at', now()->subMonth()->year)
            ->whereMonth('created_at', now()->subMonth()->month)
            ->sum('total_price');

        $incomeChangePercentage = $lastMonthIncome > 0 ? (($lastMonthIncome - $thisMonthIncome) / $lastMonthIncome) * 100 : ($thisMonthIncome > 0 ? 100 : 0);

        return view('admin.dashboard', compact(['latestBookings', 'latestConfirmBooking', 'confirmedBookings', 'pendingBookings', 'pendingPercentage', 'thisMonthIncome', 'incomeChangePercentage', 'thisMonthRoomIncome', 'thisMonthBreakfastIncome']));
    }
}
