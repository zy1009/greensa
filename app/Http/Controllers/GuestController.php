<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function showlogin()
    {return view('glogin');}

    public function showregister()
    {return view('gregister');}

    public function showhome()
    {return view('ghome');}

    public function showroom()
    {return view('groom');}

    public function showabout()
    {return view('gabout');}

    public function showtrain()
    {
        $trains = Train::all();
        return view('gtrain', compact('trains'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('guest')->attempt($credentials)) {
            $guest = Guest::where('username', $credentials['username'])->first();

            $request->session()->regenerate();
            $request->session()->put('guest', $guest);
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

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|email',
            'password' => 'required'
        ]);
    
        Guest::create([
            'username' => $credentials['username'],
            'password' => bcrypt($credentials['password'])
        ]);

        return redirect('/ghome')->withErrors('Account Created !!!');
    }
}
