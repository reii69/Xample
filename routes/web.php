<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\SppController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/profile.show', function () {
    return view('profile.show');
});


Route::get('/auth.login', function () {
    return view('auth.login');
});

Route::get('/admin.daftar_dpib', function () {
    return view('admin.daftar_dpib');
});

Route::get('/admin.daftar_pekerja', function () {
    return view('admin.daftar_pekerja');
});

Route::get('/admin.daftar_rpl', function () {
    return view('admin.daftar_rpl');
});

Route::get('/admin.daftar_tav', function () {
    return view('admin.daftar_tav');
});

Route::get('/admin.daftar_tkr', function () {
    return view('admin.daftar_tkr');
});

Route::get('/admin.daftar_tsm', function () {
    return view('admin.daftar_tsm');
});

Route::get('/admin.log_pembayaran', function () {
    return view('admin.log_pembayaran');
});

Route::get('/petugas.daftar_dpib', function () {
    return view('petugas.daftar_dpib');
});

Route::get('/petugas.daftar_rpl', function () {
    return view('petugas.daftar_rpl');
});

Route::get('/petugas.daftar_tav', function () {
    return view('petugas.daftar_tav');
});

Route::get('/petugas.daftar_tkr', function () {
    return view('petugas.daftar_tkr');
});

Route::get('/petugas.daftar_tsm', function () {
    return view('petugas.daftar_tsm');
});

Route::get('/petugas.log_pembayaran', function () {
    return view('petugas.log_pembayaran');
});

Route::get('/siswa.log_pembayaran', function () {
    return view('siswa.log_pembayaran');
});

Route::get('/calender', function () {
    return view('calender');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/notfound', function () {
    return view('notfound'); 
})->name('notfound');

Route::delete('users/{user}', [ViewController::class, 'destroy69'])->name('users.destroy69');

Route::get('/dashboard', [ViewController::class, 'index'])->name('dashboard');
Route::get('/admin.daftar_pekerja', [ViewController::class, 'index1'])->name('admin.daftar_pekerja');
Route::get('/admin.daftar_rpl', [ViewController::class, 'index2'])->name('admin.daftar_rpl');
Route::get('/admin.daftar_dpib', [ViewController::class, 'index3'])->name('admin.daftar_dpib');
Route::get('/admin.daftar_tsm', [ViewController::class, 'index4'])->name('admin.daftar_tsm');
Route::get('/admin.daftar_tav', [ViewController::class, 'index5'])->name('admin.daftar_tav');
Route::get('/admin.daftar_tkr', [ViewController::class, 'index6'])->name('admin.daftar_tkr');
Route::get('/petugas.daftar_rpl', [ViewController::class, 'index7'])->name('petugas.daftar_rpl');
Route::get('/petugas.daftar_dpib', [ViewController::class, 'index8'])->name('petugas.daftar_dpib');
Route::get('/petugas.daftar_tsm', [ViewController::class, 'index9'])->name('petugas.daftar_tsm');
Route::get('/petugas.daftar_tav', [ViewController::class, 'index10'])->name('petugas.daftar_tav');
Route::get('/petugas.daftar_tkr', [ViewController::class, 'index11'])->name('petugas.daftar_tkr');
Route::post('/admin/daftar_pekerja/store', [ViewController::class, 'store'])->name('users.store');
Route::post('/admin.daftar_pekerja', [ViewController::class, 'store1'])->name('users.store1');
Route::get('/search', [ViewController::class, 'search'])->name('search');
Route::delete('/admin/daftar_pekerja/{user}', [ViewController::class, 'destroy'])->name('users.destroy');

Route::delete('/admin.daftar_rpl', [ViewController::class, 'deleteSelected'])->name('users.deleteSelected');
Route::delete('/admin.daftar_tav', [ViewController::class, 'deleteSelected'])->name('users.deleteSelected1');
Route::delete('/admin.daftar_tkr', [ViewController::class, 'deleteSelected'])->name('users.deleteSelected2');
Route::delete('/search', [ViewController::class, 'deleteSelected'])->name('users.deleteSelected3');
Route::delete('/admin.daftar_dpib', [ViewController::class, 'deleteSelected'])->name('users.deleteSelected4');
Route::delete('/admin.daftar_tsm', [ViewController::class, 'deleteSelected'])->name('users.deleteSelected5');
Route::delete('/petugas.daftar_rpl', [ViewController::class, 'deleteSelected'])->name('users.deleteSelected6');
Route::delete('/petugas.daftar_tav', [ViewController::class, 'deleteSelected'])->name('users.deleteSelected7');
Route::delete('/petugas.daftar_tkr', [ViewController::class, 'deleteSelected'])->name('users.deleteSelected8');
Route::delete('/petugas.daftar_dpib', [ViewController::class, 'deleteSelected'])->name('users.deleteSelected9');
Route::delete('/petugas.daftar_tsm', [ViewController::class, 'deleteSelected'])->name('users.deleteSelected10');

Route::get('siswa.log_pembayaran', [SppController::class, 'index'])->name('siswa.log_pembayaran');
Route::get('admin.log_pembayaran', [SppController::class, 'index1'])->name('admin.log_pembayaran');
Route::get('petugas.log_pembayaran', [SppController::class, 'index2'])->name('petugas.log_pembayaran');
Route::post('/bayar/{log}', [SPPController::class, 'bayar'])->name('bayar');
Route::post('/admin.log_pembayaran/store', [SppController::class, 'generateDataBaru'])->name('generateDataBaru');
Route::post('/petugas.log_pembayaran/store', [SppController::class, 'generateDataBaru'])->name('generateDataBaru1');
Route::delete('admin.log_pembayaran/{id}', [SppController::class, 'destroy'])->name('log_pembayaran.destroy');
Route::delete('petugas.log_pembayaran/{id}', [SppController::class, 'destroy'])->name('log_pembayaran.destroy1');