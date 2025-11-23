<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\RedirectResponse;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('crud.cities.index', [
            'cities' => City::all()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.cities.edit', [
            'city' => [],
            'method' => 'POST',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        $city = City::create($request->validated());

        $request->session()->flash('success', 'Város sikeresen létrehozva!');

        return view('crud.cities.edit', [
            'city' => $city,
            'method' => 'PUT',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('crud.cities.edit', [
            'city' => $city,
            'method' => 'PUT',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->validated());

        $request->session()->flash('success', 'Város sikeresen módosítva!');

        return view('crud.cities.edit', [
            'city' => $city,
            'method' => 'PUT',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city): RedirectResponse
    {
        $city->delete();

        return redirect('/crud/cities');
    }
}
