<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CustomerProfileController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Show Profile
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $user = Auth::user();

        return view('customer.profile', compact('user'));
    }


    /*
    |--------------------------------------------------------------------------
    | Update Profile
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'phone' => 'nullable|string|max:20',

            'location' => 'nullable|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
        ]);

        return redirect()
            ->route('customer.profile')
            ->with('success', 'Profile updated successfully!');
    }


    /*
    |--------------------------------------------------------------------------
    | Delivery Address
    |--------------------------------------------------------------------------
    */

    public function address()
    {
        $user = Auth::user();

        return view('customer.address', compact('user'));
    }


    /*
    |--------------------------------------------------------------------------
    | Update Delivery Address
    |--------------------------------------------------------------------------
    */

    public function updateAddress(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string|max:20',
            'location' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $user->update([
            'phone' => $request->phone,
            'location' => $request->location,
        ]);

        return redirect()
            ->route('customer.address')
            ->with('success', 'Delivery address updated successfully!');
    }


    /*
    |--------------------------------------------------------------------------
    | Change Password
    |--------------------------------------------------------------------------
    */

    public function passwordForm()
    {
        return view('customer.password');
    }


    /*
    |--------------------------------------------------------------------------
    | Update Password
    |--------------------------------------------------------------------------
    */

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',

            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {

            return back()
                ->withErrors([
                    'current_password' => 'Your current password is incorrect.',
                ]);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('customer.profile')
            ->with('success', 'Password changed successfully!');
    }


    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    */

    public function settings()
    {
        $user = Auth::user();

        return view('customer.settings', compact('user'));
    }


    /*
    |--------------------------------------------------------------------------
    | Update Settings
    |--------------------------------------------------------------------------
    */

    public function updateSettings(Request $request)
    {
        $request->validate([
            'language' => 'required|in:en,sw',
        ]);

        $user = Auth::user();

        $user->update([
            'language' => $request->language,
        ]);

        return redirect()
            ->route('customer.settings')
            ->with('success', 'Settings updated successfully!');
    }
}
