<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Amenity;
use App\Models\User;
use Mail;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reservations.index', [
            'reservations' => Reservation::paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $amenities = Amenity::all(); // Fetch all amenities from the database
        return view('reservations.create', compact('amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = \Str::slug($validated['user_id'].'-'.$validated['amenity_id'].'-'.now()->timestamp);
        Reservation::create($validated);
        $email = User::find($validated['user_id'])->email;
        $user_name = User::find($validated['user_id'])->name;
        $reservation = [
            'user_name' => $user_name,
            'amenity_name' => Amenity::find($validated['amenity_id'])->name,
            'date' => $validated['date'],
        ];



        Mail::to($email)->send(new \App\Mail\ReservationCreated($reservation));
        return redirect()->route('reservations.index')->with('flash.banner', 'Reservation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
       return view('reservations.edit', [
         'reservation' => $reservation,
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $validated = $request->validated();
        $validated['slug'] = \Str::slug($validated['user_id'].'-'.$validated['amenity_id'].'-'.now()
           ->timestamp);
        $reservation->update($validated);
        return redirect()->route('reservations.index')->with('flash.banner', 'Reservation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $model = $reservation->id;
        $reservation->delete();
        return redirect()->route('reservations.index')->with('flash.banner', 'Reservation '. $model .' deleted successfully');
    }
}
