<?php

  namespace App\Http\Controllers;

  use App\Http\Requests\StoreAmenityRequest;
  use App\Http\Requests\UpdateAmenityRequest;
  use App\Models\Amenity;

  class AmenityController extends Controller
  {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('amenities.index', [
        'amenities' => Amenity::paginate(),
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('amenities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAmenityRequest $request)
    {
      // Get the validated data
      $validated = $request->validated();
      // Get slug from name
      $validated['slug'] = \Str::slug($validated['name']);

      Amenity::create($validated);
      return redirect()->route('amenities.index')->with('flash.banner', 'Amenity created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Amenity $amenity)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Amenity $amenity)
    {
      return view('amenities.edit', [
        'amenity' => $amenity,
      ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAmenityRequest $request, Amenity $amenity)
    {
      $validated = $request->validated();
      $validated['slug'] = \Str::slug($validated['name']);
      $amenity->update($validated);
      return redirect()->route('amenities.index')->with('flash.banner', 'Amenity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Amenity $amenity)
    {
      $model = $amenity->name;
      $amenity->delete();

      return redirect()->route('amenities.index')->with('flash.banner', 'Amenity '. $model .' deleted 
      successfully.');
    }
  }
