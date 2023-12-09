<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PimpinanKampusController extends Controller
{
    public function login()
    {
        return view('pimpinan.login');
    }
 
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('guard3')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/pimpinan/aduan');
        }

        session()->flash('gagal_login', 'Email tidak terdaftar');
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
 
    public function logout(Request $request)
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/pimpinan/login');
    }
    
    public function aduan_diterima()
    {
        $data_aduan = Aduan::has('transaksi_aduan')
        ->whereHas('transaksi_aduan', function ($query) {
            $query->whereNotNull('tindak_lanjut')
                ->whereNull('id_solusi');
        })
        ->with(['transaksi_aduan' => function ($query) {
            $query->whereNotNull('tindak_lanjut')
                ->whereNull('id_solusi');
        }])
        ->whereDoesntHave('transaksi_aduan', function ($query) {
            $query->whereNotNull('id_solusi');
        })
        ->orderBy('id_aduan', 'desc')
        ->simplePaginate(15);
    
        return view('pimpinan.aduan.aduan_diterima', compact('data_aduan'));
    }
}
