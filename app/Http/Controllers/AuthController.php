<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Check if user is already logged in
        if ($request->session()->has('id')) {
            return redirect()->route('profile'); // Redirect to a named route for better practice
        }

        // Check if the form is submitted
        if ($request->isMethod('get')) {
            // Validate the form input
            $validatedData = $request->validate([
                'email' => 'required',
                'passkey' => 'required',
            ]);

            $email = $validatedData['email'];
            $password = $validatedData['passkey'];

            // Query the database for the user
            $user = User::where('email', $email)->first(); // Fetch the first user with matching email

            if ($user) {
                // Verify the password
                if (Crypt::decrypt($user->passkey) === $password) {
                    // Set the session ID
                    $request->session()->regenerate(); // Regenerate session ID for security
                    $request->session()->put('id', $user->user_id); // Store the user ID in the session

                    // Redirect to the user dashboard
                    return redirect()->route('profile');
                } else {
                    // Return an error message if the password is incorrect
                    return back()->withErrors(['Invalid password']);
                }
            } else {
                // Return an error message if the user does not exist
                return back()->withErrors(['Account does not exist']);
            }
        }

        return view('auth.login'); // Return the login view if it's not a POST request
    }
}
