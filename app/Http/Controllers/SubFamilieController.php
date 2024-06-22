<?php

namespace App\Http\Controllers;

use App\Http\Requests\orderRequest;
use App\Http\Requests\SubFamilieRequest;
use App\Models\Familie;
use App\Models\Region;
use App\Models\SubFamilie;
use Illuminate\Http\Request;

class SubFamilieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sf = 'sub_families';
        $nameTable = 'sub_families';
        // Check if search input is set in the request
    if ($request->has('search')) {
        // Perform the search
        $searchTerm = $request->input('search');
        $sub_families = SubFamilie::where('sub_familie', 'like', '%' . $searchTerm . '%')->paginate(10);
    } else {
        // If search input is not set, fetch all sub_families
        $sub_families = SubFamilie::paginate(10);
    }

        return view('back-end.sub_families.index',['sub_families' => $sub_families,'sf'=>$sf,'nameTable'=>$nameTable]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sf = 'sub_families';
        $nameTable = 'sub_families';

        $families = Familie::all();
        return view('back-end.sub_families.create',compact('families','sf','nameTable'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(SubFamilieRequest $request)
    {
        $sub_familie = $request->all();
        if($request->hasFile('image')){
        $sub_familie['image'] = $request->file('image')->store('imageSubFamilie','public');
        }
        SubFamilie::create($sub_familie);
        return redirect()->route('sub_families.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $sub_familie = SubFamilie::findOrFail($id);
        return view('back-end.sub_families.show',['sub_familie'=>$sub_familie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $sf = 'sub_families';
        $nameTable = 'sub_families';

        $sub_familie = SubFamilie::findOrFail($id);
        $families = Familie::all();
        return view('back-end.sub_families.edit',['sub_familie'=>$sub_familie,'families'=>$families,'sf'=>$sf,'nameTable'=>$nameTable]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(SubFamilieRequest $request, int $id)
    {
        $sub_familie = $request->all();
        $sub_familieS = SubFamilie::findOrFail($id);
        if($request->hasFile('image')){
        $sub_familie['image'] = $request->file('image')->store('imageSubFamilie','public');
        }
        $sub_familieS->update($sub_familie);
        return redirect()->route('sub_families.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $sub_familie = SubFamilie::findOrFail($id);
        $sub_familie->delete();
        return redirect()->route('sub_families.index');
    }
}
