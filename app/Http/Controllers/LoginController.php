<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class LoginController extends Controller
{
    public function showLoginForm()
    {
    return view('auth.signin'); // Ensure this matches the actual file name and path
    }

    // Handle login submission
    public function login(Request $request)
    {
        // Validate login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect to intended page or dashboard
            return redirect()->intended('dashboard')->with('success', 'Login successful!');
        }

        // If authentication fails, redirect back with an error
        return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');
    }
}
