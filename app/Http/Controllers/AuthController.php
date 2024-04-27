<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validation and authentication logic
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Perform your database query or authentication check here
        // For example, using Eloquent to check a User model:
        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Login successful
            session(['user_id' => $user->id]); // Start session or do your session management
            return redirect('/dashboard'); // Redirect upon success
        }

        return redirect('/login')->with('error', 'Invalid credentials'); // Redirect with error
    }
}
