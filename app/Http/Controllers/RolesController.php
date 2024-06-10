<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('roles.index', [
            'roles' => Roles::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRolesRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = time();
        Roles::create($validated);
        return redirect()->route('roles.index')->with('flash.banner', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Roles $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roles $roles)
    {
        return view('roles.edit', [
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolesRequest $request, Roles $roles)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']).Str::random(10);
        $roles->update($validated);
        return redirect()->route('roles.index')->with('flash.banner', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roles $roles)
    {
        $roles->delete();
        return redirect()->route('roles.index')->with('flash.banner', 'Role deleted successfully.');
    }
}
