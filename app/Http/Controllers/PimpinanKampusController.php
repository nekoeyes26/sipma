<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Solusi;
use App\Models\TransaksiAduan;
use Carbon\Carbon;
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

            $intendedUrl = session()->pull('url.intended', '/pimpinan');

            return redirect()->intended($intendedUrl);
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
        if (!Auth::guard('guard3')->check()) {
            session()->put('url.intended', url()->current());
            return redirect('/pimpinan/login');
        }

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

    public function aduan_level_1()
    {
        if (!Auth::guard('guard3')->check()) {
            session()->put('url.intended', url()->current());
            return redirect('/pimpinan/login');
        }

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
        ->where('level_aduan', 1)
        ->orderBy('id_aduan', 'desc')
        ->simplePaginate(15);
    
        return view('pimpinan.aduan.aduan_level_1', compact('data_aduan'));
    }

    public function aduan_level_2()
    {
        if (!Auth::guard('guard3')->check()) {
            session()->put('url.intended', url()->current());
            return redirect('/pimpinan/login');
        }

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
        ->where('level_aduan', 2)
        ->orderBy('id_aduan', 'desc')
        ->simplePaginate(15);
    
        return view('pimpinan.aduan.aduan_level_2', compact('data_aduan'));
    }

    public function aduan_level_3()
    {
        if (!Auth::guard('guard3')->check()) {
            session()->put('url.intended', url()->current());
            return redirect('/pimpinan/login');
        }

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
        ->where('level_aduan', 3)
        ->orderBy('id_aduan', 'desc')
        ->simplePaginate(15);
    
        return view('pimpinan.aduan.aduan_level_3', compact('data_aduan'));
    }

    public function aduan_selesai()
    {
        if (!Auth::guard('guard3')->check()) {
            session()->put('url.intended', url()->current());
            return redirect('/pimpinan/login');
        }

        $data_aduan = Aduan::join('transaksi_aduan', 'aduan.id_aduan', '=', 'transaksi_aduan.id_aduan')
            ->join('solusi', 'transaksi_aduan.id_solusi', '=', 'solusi.id_solusi')
            ->whereNotNull('transaksi_aduan.id_solusi')
            ->orderBy('solusi.tanggal_solusi', 'desc')
            ->select('aduan.*')
            ->simplePaginate(15);

        return view('pimpinan.aduan.aduan_selesai', compact('data_aduan'));
    }

    public function detail_aduan($id)
    {
        if (!Auth::guard('guard3')->check()) {
            session()->put('url.intended', url()->current());
            return redirect('/pimpinan/login');
        }

        $aduan = TransaksiAduan::where('id_aduan', $id)->first();

        return view('pimpinan.aduan.detail_aduan', compact('aduan'));
    }

    public function kirim_solusi(Request $request, $id)
    {
        if (!Auth::guard('guard3')->check()) {
            return redirect('/pimpinan/login');
        }

        $solusi = new Solusi();
        $solusi->id_pimpinan = Auth::guard('guard3')->user()->id_pimpinan;
        $solusi->solusi = $request->solusi;
        $solusi->tanggal_solusi = Carbon::now();
        $solusi->save();

        $id_solusi = $solusi->id_solusi;

        $aduan = TransaksiAduan::where('id_aduan', $id)->first();
        $aduan->id_solusi = $id_solusi;
        $aduan->update();
        session()->flash('flash_message', 'Solusi berhasil dikirim');
        return redirect('/pimpinan/aduan/selesai');
    }
}
