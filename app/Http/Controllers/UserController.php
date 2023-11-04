<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function permissions($roleId)
    {
        $permissionsId = DB::table('role_has_permissions')->where('role_id', '=', $roleId)->pluck('permission_id');
        $permissions = DB::table('permissions')->whereIn('id', $permissionsId)->get();
        return response()->json($permissions, 200);
    }
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
        $users = User::with('roles')->paginate(10);
        return view('user.index', [
            "title" => "User List",
            "user" => $user,
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $roles = DB::table("roles")->pluck('name');
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
            'username' => 'required',
            'name' => 'required',
            'nik' => 'required',
            'role' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
        ]);
        try {
            User::create([
                'username' => $validatedData['username'],
                'name' => $validatedData['name'],
                'nik' => $validatedData['nik'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ])->assignRole($validatedData['role']);
            return redirect('/user')->with('success', 'New user has been created');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
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
        dd("edit");
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
