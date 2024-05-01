<?php
// Import the User model
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware;
use App\Models\User;

// Assume you're within a controller method
class Profile extends Controller
{
    public function getUser(Request $request)
    {
        // Fetch the authenticated user's ID from the session
        $userId = $request->session()->get('id');

        // Fetch the user from the database
        $user = User::find($userId);

        return response($content, 200)->header('Content-Type', 'text/html; charset=utf-8');
    }
}