<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeesRequest;
use App\Http\Requests\UpdateEmployeesRequest;
use App\Models\City;
use Illuminate\View\View;

class EngineerController extends Controller
{
    /**
     * Display a listing of engineers
     */
    public function index(): View
    {
        return view('engineers', [
            'engineersTree' => City::with('sites.employees')->get()
        ]); 
    }
}