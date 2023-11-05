<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.login', [
            "title" => "Login Page",
        ]);
    }
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Login Success');
        }
        return back()->with('error', 'Login Failed');

    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    public function register(Request $request)
    {
        $roles = DB::table("roles")->pluck('name');
        return view('auth.register', [
            "title" => "Register Page",
            "roles" => $roles
        ]);
    }
    public function store(UserStoreRequest $request)
    {
        try {
            User::create([
                'username' => $request['username'],
                'name' => $request['name'],
                'nik' => $request['nik'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ])->assignRole($request['role']);
            return redirect('/login')->with('success', 'Your Account has been created');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
