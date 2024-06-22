<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $us ='users';
        $nameTable = 'users';
        // Check if search input is set in the request
    if ($request->has('search')) {
        // Perform the search
        $searchTerm = $request->input('search');
        $users = User::where('first_name', 'like', '%' . $searchTerm . '%')->paginate(10);
    } else {
        // If search input is not set, fetch all users
        $users = User::paginate(10);
    }

        return view('back-end.users.index',['users' => $users,'us'=>$us,'nameTable'=>$nameTable]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $us ='users';
        $nameTable = 'users';

        return view('back-end.users.create',compact('us','nameTable'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request);
        User::create($request->all());
        return redirect()->route('users.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $user = User::findOrFail($id);
        return view('back-end.users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $us ='users';
        $nameTable = 'users';

        $user = User::findOrFail($id);
        return view('back-end.users.edit',['user'=>$user,'us'=>$us,'nameTable'=>$nameTable]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UserRequest $request, int $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
