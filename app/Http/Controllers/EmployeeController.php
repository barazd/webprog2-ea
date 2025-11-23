<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\Site;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('crud.employees.index', [
            'employees' => Employee::all()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sites = Site::all();

        return view('crud.employees.edit', [
            'employee' => [],
            'sites' => $sites,
            'method' => 'POST',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());

        $request->session()->flash('success', 'Munkavállaló sikeresen létrehozva!');

        $sites = Site::all();

        return view('crud.employees.edit', [
            'employee' => $employee,
            'sites' => $sites,
            'method' => 'PUT',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $sites = Site::all();

        return view('crud.employees.edit', [
            'employee' => $employee,
            'sites' => $sites,
            'method' => 'PUT',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        
        $request->session()->flash('success', 'Munkavállaló sikeresen módosítva!');
        
        $sites = Site::all();

        return view('crud.employees.edit', [
            'employee' => $employee,
            'sites' => $sites,
            'method' => 'PUT',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();

        return redirect('/crud/employees');
    }
}
