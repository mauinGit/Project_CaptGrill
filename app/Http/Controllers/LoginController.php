<?php

// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('page.login'); // nanti kita buat blade-nya
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // kalau admin — boleh ke kasir atau langsung ke admin panel
            if ($user->role === 'admin') {
                return redirect()->route('kasir.index'); // atau route('filament.admin.pages.dashboard')
            }

            // kalau kasir
            if ($user->role === 'kasir') {
                return redirect()->route('kasir.index');
            }

            // role lain (kalau someday ada)
            Auth::logout();
            return back()->withErrors(['email' => 'Role tidak diizinkan.']);
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