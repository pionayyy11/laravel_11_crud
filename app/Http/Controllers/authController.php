<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function register(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Create a new user
    \App\Models\User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']), // Ensure password is hashed
    ]);

    // Redirect to the login page with a success message
    return redirect()->route('login.form')->with('success', 'Registration successful! Please log in.');
}

    public function login(Request $request)
    {
        // Validate the incoming request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('login.form')->with('success', 'Login successful!');
        }

        // Redirect back with an error message if login fails
        return back()->with('error', 'Invalid credentials. Please try again.');
    }
}