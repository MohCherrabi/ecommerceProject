<?php

namespace App\Http\Controllers;

use App\Http\Requests\orderRequest;
use App\Http\Requests\UnitRequest;
use App\Models\Region;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $un = 'units';
        $nameTable = 'units';
        // Check if search input is set in the request
    if ($request->has('search')) {
        // Perform the search
        $searchTerm = $request->input('search');
        $units = Unit::where('unit', 'like', '%' . $searchTerm . '%')->paginate(10);
    } else {
        // If search input is not set, fetch all units
        $units = Unit::paginate(10);
    }

        return view('back-end.units.index',['units' => $units,'un'=>$un,'nameTable'=>$nameTable]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $un = 'units';
        $nameTable = 'units';

        return view('back-end.units.create',compact('un','nameTable'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitRequest $request)
    {
        Unit::create($request->all());
        return redirect()->route('units.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $unit = Unit::findOrFail($id);
        return view('back-end.units.show',['unit'=>$unit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $un = 'units';
        $nameTable = 'units';

        $unit = Unit::findOrFail($id);
        return view('back-end.units.edit',['unit'=>$unit,'un'=>$un,'nameTable'=>$nameTable]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UnitRequest $request, int $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->update($request->all());
        return redirect()->route('units.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return redirect()->route('units.index');
    }
}
