<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Bakpk;
use App\Models\Mahasiswa;
use App\Models\PimpinanKampus;
use App\Models\TransaksiAduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BakpkController extends Controller
{
    public function aduan_baru()
    {
        if (!Auth::guard('guard1')->check()) {
            return redirect('/bakpk/login');
        }

        $data_aduan = Aduan::where(function ($query) {
            $query->whereDoesntHave('transaksi_aduan')
                ->orWhereHas('transaksi_aduan', function ($query) {
                    $query->where('tindak_lanjut', null);
                });
        })
        ->whereNull('level_aduan')->orderBy('id_aduan', 'desc')->simplePaginate(15);
        return view('bakpk.aduan.aduan_baru', compact('data_aduan'));
    }

    public function aduan_menunggu_solusi()
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
    
        return view('bakpk.aduan.aduan_menunggu_solusi', compact('data_aduan'));
    }

    public function aduan_dengan_solusi()
    {
        $data_aduan = Aduan::has('transaksi_aduan')
        ->whereHas('transaksi_aduan', function ($query) {
            $query->whereNotNull('id_solusi');
        })
        ->with(['transaksi_aduan' => function ($query) {
            $query->whereNotNull('id_solusi');
        }])
        ->orderBy('id_aduan', 'desc')
        ->simplePaginate(15);
    
        return view('bakpk.aduan.aduan_dengan_solusi', compact('data_aduan'));
    }

    public function aduan_level_1()
    {
        $data_aduan = Aduan::where(function ($query) {
            $query->whereDoesntHave('transaksi_aduan')
                ->orWhereHas('transaksi_aduan', function ($query) {
                    $query->where('tindak_lanjut', null);
                });
        })
        ->where('level_aduan', 1)
        ->orderBy('id_aduan', 'desc')
        ->simplePaginate(15);
        
        return view('bakpk.aduan.aduan_level_1', compact('data_aduan'));
    }

    public function aduan_level_2()
    {
        $data_aduan = Aduan::where(function ($query) {
            $query->whereDoesntHave('transaksi_aduan')
                ->orWhereHas('transaksi_aduan', function ($query) {
                    $query->where('tindak_lanjut', null);
                });
        })
        ->where('level_aduan', 2)
        ->orderBy('id_aduan', 'desc')
        ->simplePaginate(15);
        
        return view('bakpk.aduan.aduan_level_2', compact('data_aduan'));
    }

    public function aduan_level_3()
    {
        $data_aduan = Aduan::where(function ($query) {
            $query->whereDoesntHave('transaksi_aduan')
                ->orWhereHas('transaksi_aduan', function ($query) {
                    $query->where('tindak_lanjut', null);
                });
        })
        ->where('level_aduan', 3)
        ->orderBy('id_aduan', 'desc')
        ->simplePaginate(15);
        
        return view('bakpk.aduan.aduan_level_3', compact('data_aduan'));
    }

    public function aduan_update(Request $request, $id)
    {
        $data_aduan = Aduan::find($id);
        $data_aduan->level_aduan = $request->level_aduan;
        $data_aduan->update();
        session()->flash('flash_message', 'Level Aduan berhasil diupdate');
        return back();
    }

    public function detail_aduan($id)
    {
        $aduan = TransaksiAduan::where('id_aduan', $id)->first();

        if ($aduan === null) {
            $aduan = new TransaksiAduan();
            $aduan->id_aduan = $id;
            $aduan->id_solusi = null;
            $aduan->id_bakpk = rand(1, 20);
            $aduan->tindak_lanjut = null;
            $aduan->save();
        }

        return view('bakpk.aduan.detail_aduan', compact('aduan'));
    }

    public function tindak_lanjut_update(Request $request, $id)
    {
        $aduan = TransaksiAduan::where('id_aduan', $id)->first();
        $aduan->tindak_lanjut = $request->tindak_lanjut;
        $aduan->update();
        session()->flash('flash_message', 'Tindak Lanjut berhasil diupdate');
        return redirect('/bakpk/aduan/menunggu_solusi');
    }

    public function login()
    {
        return view('bakpk.login');
    }
 
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('guard1')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/bakpk/aduan');
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
 
        return redirect('/bakpk/login');
    }

    public function bakpk_register()
    {
        return view('bakpk.register.register_bakpk');
    }

    public function bakpk_store(Request $request)
    {
        if(Bakpk::where('email', '=', $request->email)->first()) {
            session()->flash('flash_message', 'Email sudah terdaftar');
            return redirect('/bakpk/register/bakpk');
        }
        $validate = $request->validate([
            'email' => 'required|unique:bakpk,email',
            'password' => 'required',
        ]);
        $data = $request->except('password');
        $data['password'] = Hash::make($request->password);
        Bakpk::create($data);
        // Bakpk::create(array_merge($data, ['key' => "value",]));
        session()->flash('flash_message', 'Pendaftaran akun berhasil, silahkan login');
        return redirect('/bakpk/login');
    }

    public function mahasiswa_register()
    {
        return view('bakpk.register.register_mahasiswa');
    }

    public function mahasiswa_store(Request $request)
    {
        if(Mahasiswa::where('nim', '=', $request->nim)->first()) {
            session()->flash('flash_message', 'NIM sudah terdaftar');
            return redirect('/bakpk/register/mahasiswa');
        }
        $validate = $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'password' => 'required',
        ]);
        $data = $request->except('password');
        $data['password'] = Hash::make($request->password);
        // Mahasiswa::create($data);
        Mahasiswa::create(array_merge($data, ['status_mahasiswa' => "Aktif",]));
        session()->flash('flash_message', 'Pendaftaran akun berhasil, silahkan login');
        return redirect('/bakpk/');
    }

    public function pimpinan_register()
    {
        return view('bakpk.register.register_pimpinan');
    }

    public function pimpinan_store(Request $request)
    {
        if(PimpinanKampus::where('email', '=', $request->email)->first()) {
            session()->flash('flash_message', 'Email sudah terdaftar');
            return redirect('/bakpk/register/pimpinan_kampus');
        }
        $validate = $request->validate([
            'email' => 'required|unique:pimpinan_kampus,email',
            'password' => 'required',
        ]);
        $data = $request->except('password');
        $data['password'] = Hash::make($request->password);
        PimpinanKampus::create($data);
        // Bakpk::create(array_merge($data, ['key' => "value",]));
        session()->flash('flash_message', 'Pendaftaran akun berhasil, silahkan login');
        return redirect('/bakpk/');
    }
}
