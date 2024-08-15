<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    // view admin register form
    public function registerForm()
    {
        return view('admin.auth.register');
    }
    // view admin login form
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    // create admin function
    public function store(Request $request)
    {

        $fields = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $admin = Admin::create([
            'username' => $fields['username'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
        ]);

        Auth::login($admin);

        return redirect()->route('admin.dashboard')->with('success', 'Registration successful!');
    }

    // login admin function
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {

            $admin = Auth::guard('admin')->user();
            return redirect()->route('admin.dashboard')->with([
                'success' => 'Login successful!',
                'admin' => $admin
            ]);
        }

        return back()->withErrors([
            'error' => 'Invalid Login Credentials',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.dashboard', ['admin' => $admin]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout(Request $request)
    {
        // Logout from the 'admin' guard
        Auth::guard('admin')->logout();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page with a success message
        return redirect()->route('admin.login')->with('success', 'Successfully logged out!');
    }
}
