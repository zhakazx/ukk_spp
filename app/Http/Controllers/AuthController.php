<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('auth.sign-in');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
                        
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Pastikan username dan password Anda benar');
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('login');
    }
}
