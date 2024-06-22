<?php

namespace App\Http\Controllers;

use App\Http\Requests\FamileRequest;
use App\Http\Requests\FamilieRequest;
use App\Models\Region;
use App\Models\Familie;
use Illuminate\Http\Request;

class FamilieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $f = 'families';
        $nameTable = 'families';
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $families = Familie::where('label', 'like', '%' . $searchTerm . '%')->paginate(10);
        } else {
            $families = Familie::paginate(10);
        }

        return view('back-end.families.index',['families' => $families,'f'=>$f,'nameTable'=>$nameTable]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $f = 'families';
        $nameTable = 'families';
        return view('back-end.families.create',compact('f','nameTable'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(FamileRequest $request)
    {
        $familie = $request->all();
        if($request->hasFile('image')){
        $familie['image'] = $request->file('image')->store('imageFamilie','public');
        }
        Familie::create($familie);
        return redirect()->route('families.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $Familie = Familie::findOrFail($id);
        return view('back-end.families.show',['Familie'=>$Familie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $f = 'families';
        $nameTable = 'families';
        $familie = Familie::findOrFail($id);
        return view('back-end.families.edit',['familie'=>$familie,'f'=>$f,'nameTable'=>$nameTable]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(FamileRequest $request, int $id)
    {
        $familie = $request->all();
        if($request->hasFile('image')){
        $familie['image'] = $request->file('image')->store('imageFamilie','public');
        }
        $families = Familie::findOrFail($id);
        $families->update($familie);
        return redirect()->route('families.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $Familie = Familie::findOrFail($id);
        $Familie->delete();
        return redirect()->route('families.index');
    }
}
