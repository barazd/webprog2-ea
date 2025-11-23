<?php

namespace App\Http\Controllers;

use App\Models\City;

class ChartPage extends Controller
{
    /**
     * Show a chart
     */
    public function __invoke()
    {
        $cities = City::select(['name'])->withCount('sites')->get();

        return view('chart', [
            'cities' => $cities->toJson(),
        ]); 

    }
}