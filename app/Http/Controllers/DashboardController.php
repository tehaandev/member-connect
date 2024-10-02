<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Reservation;
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

        $monthNames = [
            '01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April',
            '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August',
            '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
        ];

        $monthlyUserLabel = $monthlyUserData->pluck('month')->map(function($month) use ($monthNames) {
            return $monthNames[$month] ?? $month;
        });

        $monthlyUserCounts = $monthlyUserData->pluck('user_count');

        $monthlyReservationsCount = Reservation::selectRaw("count(*) as reservation_count, strftime('%m', date) as month")
            ->whereRaw("strftime('%Y', date) = ?", [date('Y')])
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $monthlyReservationLabel = $monthlyReservationsCount->pluck('month')->map(function($month) use ($monthNames) {
            return $monthNames[$month] ?? $month;
        });

        $monthlyReservationsCount = $monthlyReservationsCount->pluck('reservation_count');

        $reservationsByAmenity = Reservation::selectRaw("count(*) as reservation_count, amenity_id")
            ->whereRaw("strftime('%Y', date) = ?", [date('Y')])
            ->whereRaw("strftime('%m', date) = ?", [date('m')])
            ->groupBy('amenity_id')
            ->orderBy('reservation_count')
            ->limit(3)
            ->get();

        $reservationsByAmenityLabel = $reservationsByAmenity->map(function($amenity) {
            return Amenity::find($amenity->amenity_id)->name;
        });

        $reservationsByAmenityCount = $reservationsByAmenity->pluck('reservation_count');

        return view('dashboard', compact('amenities', 'users', 'monthlyUserCounts', 'monthlyUserLabel', 'monthlyReservationLabel', 'monthlyReservationsCount', 'reservationsByAmenityLabel', 'reservationsByAmenityCount'));
    }
}
