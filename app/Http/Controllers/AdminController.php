<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showlogin()
    {
        return view('admin');
    }

    public function showdashboard()
    {
        return view('admind');
    }

    public function showregister()
    {
        return view('adminr');
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->intended('/admind');
        }

        return back()->withErrors('Akun salah');
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|min:6|max:255|email',
            'password' => 'required|min:5|max:255'
        ]);

        $store = [
            'username' => $validate['username'],
            'password' => Hash::make($validate['password']), // Hash the password using bcrypt
        ];
        
        Admin::create($store);

        return view('admin');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('admin');
    }
}
