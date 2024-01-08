<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function showloginguest()
    {
        return view('guest');
    }

    public function showhome()
    {
        return view('guestd');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('guest')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/guestd');
        }

        return back()->withErrors('Akun salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('guest')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('guest');
    }
}
