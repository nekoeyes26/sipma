<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function home()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }
 
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nim' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('guard2')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/pengaduan');
        }

        session()->flash('gagal_login', 'NIM tidak terdaftar');
        return back()->withErrors([
            'nim' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/');
    }

    public function pengaduan()
    {
        return view('input_aduan');
    }
}
