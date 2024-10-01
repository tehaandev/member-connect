<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $amenities = Amenity::count();
        $users = User::count();

        $monthlyUserData = User::selectRaw("count(*) as user_count, strftime('%m', created_at) as month")
            ->whereRaw("strftime('%Y', created_at) = ?", [date('Y')])
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        // Convert month numbers to names
        $monthNames = [
            '01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April',
            '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August',
            '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
        ];

        $monthlyUserLabel = $monthlyUserData->pluck('month')->map(function($month) use ($monthNames) {
            return $monthNames[$month] ?? $month;
        });

        $monthlyUserCounts = $monthlyUserData->pluck('user_count');

        return view('dashboard', compact('amenities', 'users', 'monthlyUserCounts', 'monthlyUserLabel'));
    }
}
