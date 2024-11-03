<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.signin'); 
    }

    public function submitlogin(Request $request)
    {
        // Validate 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        //dd($request->all());
        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect to intended page or dashboard
            return redirect()->intended('dashboard')->with('success', 'Login successful!');
        }

         // If authentication fails
        return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');
    }
}
