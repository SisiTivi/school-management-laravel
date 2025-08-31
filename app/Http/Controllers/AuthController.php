<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function loginPage()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            // create login token
            $request->session()->regenerate();

            // take user data
            $user = Auth::user();

            // redirect user based on role
            if ($user->role === 'ADMIN') {
                return redirect()->route('index.admin');
            } else {
                return redirect()->route('index');
            }
        }
        return back()->withErrors([
            'email' => 'email atau password salah'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'logout success');
    }
}
