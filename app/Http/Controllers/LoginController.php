<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {        
        return view('page.login');
    }

    public function login(Request $request)
    {
       
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->role === 'admin' || $user->role === 'kasir') {
                return redirect()->route('kasir.index');
            }
            
            Auth::logout();
        }

        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirect berdasarkan role
            switch ($user->role) {
                case 'admin':
                case 'kasir':
                    return redirect()->route('kasir.index');
                default:
                    Auth::logout();
                    return back()->withErrors(['email' => 'Role tidak diizinkan.']);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}