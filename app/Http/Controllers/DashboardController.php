<?php

namespace App\Http\Controllers;

use App\Models\Amenity;

class DashboardController extends Controller
{
    public function index()
    {
        $amenities = Amenity::all();
        return view('dashboard', compact('amenities'));
    }
}
