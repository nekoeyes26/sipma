<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\TransaksiAduan;
use Carbon\Carbon;
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
        if (Auth::guard('guard2')->check()) {
            return redirect()->back();
        }

        return view('login');
    }
 
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nim' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('guard2')->attempt($credentials)) {
            // Retrieve the intended URL or default to '/pengaduan'
            $intendedUrl = session()->pull('url.intended', '/pengaduan');

            return redirect()->intended($intendedUrl);
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
        if (!Auth::guard('guard2')->check()) {
            session()->put('url.intended', url()->current());
            return redirect('/login');
        }

        return view('input_aduan');
    }

    public function input_aduan(Request $request)
    {
        if (!Auth::guard('guard2')->check()) {
            return redirect('/login');
        }

        $this->validate($request, [
            'judul_aduan' => 'required',
            'detail_aduan' => 'required',
            'jenis_aduan' => 'required',
        ]);

        if ($request->has('berkas')) {
            $this->validate($request, [
                'berkas' => 'image|mimes:jpeg,jpg,png'
            ]);

            $berkas = $request->berkas;
            $nama_file = time().'.'.$berkas->getClientOriginalExtension();
            $berkas->move('berkas/', $nama_file);

            $data_aduan = new Aduan();
            $data_aduan->id_mahasiswa = Auth::guard('guard2')->user()->id_mahasiswa;
            $data_aduan->judul_aduan = $request->judul_aduan;
            $data_aduan->detail_aduan = $request->detail_aduan;
            $data_aduan->jenis_aduan = $request->jenis_aduan;
            $data_aduan->berkas = $nama_file;
            $data_aduan->tanggal_kirim = Carbon::now();
            $data_aduan->save();
        } else {
            $data_aduan = new Aduan();
            $data_aduan->id_mahasiswa = Auth::guard('guard2')->user()->id_mahasiswa;
            $data_aduan->judul_aduan = $request->judul_aduan;
            $data_aduan->detail_aduan = $request->detail_aduan;
            $data_aduan->jenis_aduan = $request->jenis_aduan;
            $data_aduan->berkas = null;
            $data_aduan->tanggal_kirim = Carbon::now();
            $data_aduan->save();
        }
        
        session()->flash('flash_message', 'Aduan berhasil terkirim');

        return redirect('/aduan_berhasil');
    }

    public function aduan_berhasil_dibuat()
    {
        if (!Auth::guard('guard2')->check()) {
            session()->put('url.intended', url()->current());
            return redirect('/login');
        }

        return view('aduan_berhasil_dibuat');
    }

    public function aduan_terbaru()
    {
        if (!Auth::guard('guard2')->check()) {
            session()->put('url.intended', url()->current());
            return redirect('/login');
        }

        $aduan = Aduan::where('id_mahasiswa', Auth::guard('guard2')->user()->id_mahasiswa)
        ->with(['transaksi_aduan' => function ($query) {
            $query->latest()->first();
        }])
        ->latest()
        ->first();

        // if ($aduan->transaksi_aduan->first() == null) {
        //     $new_transaksi = new TransaksiAduan();
        //     $new_transaksi->id_aduan = $aduan->id_aduan;
        //     $new_transaksi->id_solusi = null;
        //     $new_transaksi->id_bakpk = null;
        //     $new_transaksi->tindak_lanjut = null;
        //     $new_transaksi->save();
        // }

        return view('detail_aduan', compact('aduan'));
    }

    public function aduan_saya()
    {
        if (!Auth::guard('guard2')->check()) {
            session()->put('url.intended', url()->current());
            return redirect('/login');
        }

        $data_aduan = Aduan::where('id_mahasiswa', Auth::guard('guard2')->user()->id_mahasiswa)
        ->with(['transaksi_aduan' => function ($query) {
            $query->first();
        }])
        ->orderBy('id_aduan', 'asc')
        ->simplePaginate(15);

        return view('list_aduan_saya', compact('data_aduan'));
    }

    public function detail_aduan($id)
    {
        if (!Auth::guard('guard2')->check()) {
            session()->put('url.intended', url()->current());
            return redirect('/login');
        }

        $aduan = Aduan::where('id_aduan', $id)
        ->with(['transaksi_aduan' => function ($query) {
            $query->first();
        }])
        ->first();

        return view('detail_aduan', compact('aduan'));
    }
}
