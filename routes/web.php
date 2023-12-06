<?php

use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\BakpkController;
use App\Http\Controllers\LoginController;
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

Route::get('/', 'App\Http\Controllers\EventController@home')->name('home');

Route::get('/bakpk/aduan', 'App\Http\Controllers\BakpkController@aduan_baru');
Route::get('/bakpk/aduan/baru', 'App\Http\Controllers\BakpkController@aduan_baru')->name('bakpk.aduan.baru');
Route::get('/bakpk/aduan/level1', 'App\Http\Controllers\BakpkController@aduan_level_1')->name('bakpk.aduan.level1');
Route::get('/bakpk/aduan/level2', 'App\Http\Controllers\BakpkController@aduan_level_2')->name('bakpk.aduan.level2');
Route::get('/bakpk/aduan/level3', 'App\Http\Controllers\BakpkController@aduan_level_3')->name('bakpk.aduan.level3');
Route::get('/bakpk/aduan/menunggu_solusi', 'App\Http\Controllers\BakpkController@aduan_menunggu_solusi')->name('bakpk.aduan.menunggu_solusi');
Route::get('/bakpk/aduan/dengan_solusi', 'App\Http\Controllers\BakpkController@aduan_dengan_solusi')->name('bakpk.aduan.dengan_solusi');
Route::post('/bakpk/aduan/update/{id}', 'App\Http\Controllers\BakpkController@aduan_update')->name('bakpk.aduan.update');
Route::get('/bakpk/aduan/tindak_lanjut/{id}', 'App\Http\Controllers\BakpkController@detail_aduan')->name('bakpk.detail_aduan');
Route::post('/bakpk/aduan/tindak_lanjut/update/{id}', 'App\Http\Controllers\BakpkController@tindak_lanjut_update')->name('bakpk.tindak_lanjut.update');
Route::get('/bakpk/login', [BakpkController::class, 'login'])->name('bakpk.login')->middleware('guest');
Route::post('/bakpk/login', [BakpkController::class, 'authenticate']);
Route::post('/bakpk/logout', [BakpkController::class, 'logout']);
Route::get('/bakpk/register/bakpk', [BakpkController::class, 'bakpk_register'])->name('bakpk.register.bakpk');
Route::post('/bakpk/register/bakpk', [BakpkController::class, 'bakpk_store'])->name('bakpk.store.bakpk');
