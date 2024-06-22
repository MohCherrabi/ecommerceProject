<?php

namespace App\Http\Controllers;

use App\Http\Requests\orderRequest;
use App\Http\Requests\StatusesRequest;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $s = 'statuses';
        $nameTable = 'statuses';
        // Check if search input is set in the request
    if ($request->has('search')) {
        // Perform the search
        $searchTerm = $request->input('search');
        $statuses = Status::where('status', 'like', '%' . $searchTerm . '%')->paginate(10);
    } else {
        // If search input is not set, fetch all statuses
        $statuses = Status::paginate(10);
    }

        return view('back-end.statuses.index',['statuses' => $statuses,'s'=>$s,'nameTable'=>$nameTable]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $s = 'statuses';
        $nameTable = 'statuses';

        return view('back-end.statuses.create',compact('s','nameTable'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusesRequest $request)
    {
        Status::create($request->all());
        return redirect()->route('statuses.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $status = Status::findOrFail($id);
        return view('back-end.statuses.show',['status'=>$status]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $s = 'statuses';
        $nameTable = 'statuses';

        $status = Status::findOrFail($id);
        return view('back-end.statuses.edit',['status'=>$status,'s'=>$s,'nameTable'=>$nameTable]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(StatusesRequest $request, int $id)
    {
        $status = Status::findOrFail($id);
        $status->update($request->all());
        return redirect()->route('statuses.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $status = Status::findOrFail($id);
        $status->delete();
        return redirect()->route('statuses.index');
    }
}
