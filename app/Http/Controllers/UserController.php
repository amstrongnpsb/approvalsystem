<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function groupList()
    {
        $user = Auth::user();
        return view('user.index', [
            "title" => "",
            "user" => $user
        ]);
    }
    public function index()
    {
        $user = Auth::user();
        return view('user.index', [
            "title" => "User List",
            "user" => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $user = Auth::user();
       $roles = Role::all();
        return view('user.create', [
            "title" => "Create User",
            "user" => $user,
            "roles" => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'role_id' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
        ]);

        User::create($validatedData);
        return redirect('/user')->with('success', 'New user has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
