<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\Site;
use App\Models\City;
use Illuminate\Http\RedirectResponse;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('crud.sites.index', [
            'sites' => Site::all()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();

        return view('crud.sites.edit', [
            'site' => [],
            'cities' => $cities,
            'method' => 'POST',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiteRequest $request)
    {
        $site = Site::create($request->validated());

        $cities = City::all();

        return view('crud.sites.edit', [
            'site' => $site,
            'cities' => $cities,
            'method' => 'PUT',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site)
    {
        $cities = City::all();

        return view('crud.sites.edit', [
            'site' => $site,
            'cities' => $cities,
            'method' => 'PUT',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiteRequest $request, Site $site)
    {
        $site->update($request->validated());

        $cities = City::all();

        return view('crud.sites.edit', [
            'site' => $site,
            'cities' => $cities,
            'method' => 'PUT',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site): RedirectResponse
    {
        $site->delete();

        return redirect('/crud/sites');
    }
}
