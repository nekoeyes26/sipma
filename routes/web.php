<?php

use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\BakpkController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PimpinanKampusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\MahasiswaController@home')->name('home');
Route::get('/login', [MahasiswaController::class, 'login'])->name('mahasiswa.login')->middleware('guest:guard2');
Route::post('/login', [MahasiswaController::class, 'authenticate']);
Route::post('/logout', [MahasiswaController::class, 'logout']);
Route::get('/pengaduan', 'App\Http\Controllers\MahasiswaController@pengaduan')->name('pengaduan');
Route::post('/pengaduan/store', 'App\Http\Controllers\MahasiswaController@input_aduan')->name('aduan.store');
Route::get('/aduan_berhasil', 'App\Http\Controllers\MahasiswaController@aduan_berhasil_dibuat')->name('aduan_berhasil_dibuat');
Route::get('/aduan_terbaru', 'App\Http\Controllers\MahasiswaController@aduan_terbaru')->name('aduan.recent');
Route::get('/aduan_saya', 'App\Http\Controllers\MahasiswaController@aduan_saya')->name('aduan.saya');
Route::get('/detail_aduan/{id}', 'App\Http\Controllers\MahasiswaController@detail_aduan')->name('detail_aduan');
Route::get('/profil', 'App\Http\Controllers\MahasiswaController@profil')->name('profil');
Route::get('/tata_cara', 'App\Http\Controllers\MahasiswaController@tata_cara')->name('tata_cara');
Route::get('/tentang', 'App\Http\Controllers\MahasiswaController@tentang')->name('tentang');
Route::get('/aduan/download/{id}', 'App\Http\Controllers\MahasiswaController@download_aduan')->name('aduan.download');

Route::get('/bakpk', 'App\Http\Controllers\BakpkController@aduan_baru');
Route::get('/bakpk/aduan', 'App\Http\Controllers\BakpkController@aduan_baru')->name('bakpk');
Route::get('/bakpk/aduan/baru', 'App\Http\Controllers\BakpkController@aduan_baru')->name('bakpk.aduan.baru');
Route::get('/bakpk/aduan/level1', 'App\Http\Controllers\BakpkController@aduan_level_1')->name('bakpk.aduan.level1');
Route::get('/bakpk/aduan/level2', 'App\Http\Controllers\BakpkController@aduan_level_2')->name('bakpk.aduan.level2');
Route::get('/bakpk/aduan/level3', 'App\Http\Controllers\BakpkController@aduan_level_3')->name('bakpk.aduan.level3');
Route::get('/bakpk/aduan/menunggu_solusi', 'App\Http\Controllers\BakpkController@aduan_menunggu_solusi')->name('bakpk.aduan.menunggu_solusi');
Route::get('/bakpk/aduan/dengan_solusi', 'App\Http\Controllers\BakpkController@aduan_dengan_solusi')->name('bakpk.aduan.dengan_solusi');
Route::post('/bakpk/aduan/update/{id}', 'App\Http\Controllers\BakpkController@aduan_update')->name('bakpk.aduan.update');
Route::get('/bakpk/aduan/tindak_lanjut/{id}', 'App\Http\Controllers\BakpkController@detail_aduan')->name('bakpk.detail_aduan');
Route::post('/bakpk/aduan/tindak_lanjut/update/{id}', 'App\Http\Controllers\BakpkController@tindak_lanjut_update')->name('bakpk.tindak_lanjut.update');
Route::get('/bakpk/login', [BakpkController::class, 'login'])->name('bakpk.login')->middleware('guest:guard1');
Route::post('/bakpk/login', [BakpkController::class, 'authenticate']);
Route::post('/bakpk/logout', [BakpkController::class, 'logout']);
Route::get('/bakpk/register/bakpk', [BakpkController::class, 'bakpk_register'])->name('bakpk.register.bakpk');
Route::post('/bakpk/register/bakpk', [BakpkController::class, 'bakpk_store'])->name('bakpk.store.bakpk');
Route::get('/bakpk/register/mahasiswa', [BakpkController::class, 'mahasiswa_register'])->name('bakpk.register.mahasiswa');
Route::post('/bakpk/register/mahasiswa', [BakpkController::class, 'mahasiswa_store'])->name('bakpk.store.mahasiswa');
Route::get('/bakpk/register/pimpinan', [BakpkController::class, 'pimpinan_register'])->name('bakpk.register.pimpinan');
Route::post('/bakpk/register/pimpinan', [BakpkController::class, 'pimpinan_store'])->name('bakpk.store.pimpinan');
Route::get('/bakpk/tatacara', 'App\Http\Controllers\BakpkController@tatacara')->name('bakpk.tatacara');
Route::get('/bakpk/about', 'App\Http\Controllers\BakpkController@about')->name('bakpk.about');
Route::get('/bakpk/list_akun/mahasiswa', 'App\Http\Controllers\BakpkController@list_akun_mhs')->name('bakpk.akun.mhs');
Route::post('/bakpk/mhs_status/{id}', 'App\Http\Controllers\BakpkController@update_status_mhs')->name('bakpk.update.status.mhs');
Route::get('/bakpk/list_akun/pimpinan', 'App\Http\Controllers\BakpkController@list_akun_pimpinan')->name('bakpk.akun.pimpinan');
Route::get('/bakpk/aduan/download/{id}', 'App\Http\Controllers\BakpkController@download_aduan')->name('bakpk.download.detail');

Route::get('/pimpinan/login', [PimpinanKampusController::class, 'login'])->name('pimpinan.login')->middleware('guest:guard3');
Route::post('/pimpinan/login', [PimpinanKampusController::class, 'authenticate']);
Route::post('/pimpinan/logout', [PimpinanKampusController::class, 'logout']);
Route::get('/pimpinan', 'App\Http\Controllers\PimpinanKampusController@aduan_diterima');
Route::get('/pimpinan/aduan', 'App\Http\Controllers\PimpinanKampusController@aduan_diterima')->name('pimpinan.aduan');
Route::get('/pimpinan/aduan/level1', 'App\Http\Controllers\PimpinanKampusController@aduan_level_1')->name('pimpinan.aduan.level1');
Route::get('/pimpinan/aduan/level2', 'App\Http\Controllers\PimpinanKampusController@aduan_level_2')->name('pimpinan.aduan.level2');
Route::get('/pimpinan/aduan/level3', 'App\Http\Controllers\PimpinanKampusController@aduan_level_3')->name('pimpinan.aduan.level3');
Route::get('/pimpinan/aduan/selesai', 'App\Http\Controllers\PimpinanKampusController@aduan_selesai')->name('pimpinan.aduan.selesai');
Route::get('/pimpinan/aduan/detail/{id}', 'App\Http\Controllers\PimpinanKampusController@detail_aduan')->name('pimpinan.detail_aduan');
Route::post('/pimpinan/aduan/solusi/post/{id}', 'App\Http\Controllers\PimpinanKampusController@kirim_solusi')->name('pimpinan.kirim_solusi');
Route::get('/pimpinan/tentang', 'App\Http\Controllers\PimpinanKampusController@tentang')->name('pimpinan.tentang');
Route::get('/pimpinan/aduan/download/{id}', 'App\Http\Controllers\PimpinanKampusController@download_aduan')->name('pimpinan.download.detail');