<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Show admin login page
    public function showLogin()
    {
        return view('admin.login');
    }


    // Login admin
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        // Check login credentials
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // Make sure logged-in user is admin
            if (Auth::user()->role !== 'admin') {

                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()
                    ->withErrors([
                        'email' => 'You do not have admin access.',
                    ])
                    ->onlyInput('email');
            }


            return redirect()
                ->intended(route('admin.dashboard'))
                ->with('success', 'Welcome to Mazeoz Food Admin!');
        }


        return back()
            ->withErrors([
                'email' => 'The email or password is incorrect.',
            ])
            ->onlyInput('email');
    }


    // Logout admin
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('admin.login')
            ->with('success', 'You have been logged out successfully.');
    }
}