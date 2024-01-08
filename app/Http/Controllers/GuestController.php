<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function showlogin()
    {return view('glogin');}

    public function showhome()
    {return view('ghome');}

    public function showroom()
    {return view('groom');}

    public function showtrain()
    {return view('gtrain');}

    public function showabout()
    {return view('gabout');}

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('guest')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/ghome');
        }

        return back()->withErrors('Akun salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('guest')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/ghome');
    }
}
