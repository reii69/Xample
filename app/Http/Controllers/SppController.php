<?php

namespace App\Http\Controllers;

use App\Models\SPP;
use Illuminate\Http\Request;
use App\Models\User;

class SppController extends Controller
{
    public function index()
    {
      
        $user_id = auth()->id(); // Mendapatkan ID pengguna yang terautentikasi
        $users = SPP::where('user_id', $user_id)->paginate(5); // Mengambil data Log SPP milik pengguna yang terautentikasi dengan pagination
    
        return view('siswa.log_pembayaran', compact('users')); // Mengirim data ke view

      
    }
    
    public function index1()
    {

        $userRole = auth()->user()->role;
    
        if ($userRole === 'siswa') {
            return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
        }

        $users = SPP::whereHas('user', function ($query) {
                    $query->where('role', 'siswa')
                          ->whereNotNull('nisn')
                          ->whereNotNull('jurusan');
                })->paginate(5); // Mengambil data Log SPP dengan pagination
        $users1 = User::where('role', 'siswa')
                      ->whereNotNull('nisn') // Hanya ambil data dengan NISN tidak kosong
                      ->whereNotNull('jurusan') // Hanya ambil data dengan jurusan tidak kosong
                      ->paginate(5); // Mengambil data User dengan peran siswa
        return view('admin.log_pembayaran', compact('users', 'users1')); // Mengirim data ke view

     
    }

        
    public function index2()
    {

        $userRole = auth()->user()->role;
    
        if ($userRole === 'siswa') {
            return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
        }

        $users = SPP::whereHas('user', function ($query) {
                    $query->where('role', 'siswa')
                          ->whereNotNull('nisn')
                          ->whereNotNull('jurusan');
                })->paginate(5); // Mengambil data Log SPP dengan pagination
        $users1 = User::where('role', 'siswa')
                      ->whereNotNull('nisn') // Hanya ambil data dengan NISN tidak kosong
                      ->whereNotNull('jurusan') // Hanya ambil data dengan jurusan tidak kosong
                      ->paginate(5); // Mengambil data User dengan peran siswa
        return view('petugas.log_pembayaran', compact('users', 'users1')); // Mengirim data ke view

     
    }
    
    
    

public function bayar(SPP $log)
{
    // Lakukan validasi atau logika pembayaran sesuai kebutuhan

    // Contoh: Update status pembayaran menjadi 'sudah bayar'
    $log->status = 'Sukses';
    $log->save();

    return redirect()->back()->with('success', 'Pembayaran berhasil');
}

public function generateDataBaru()
{
    // Ambil bulan saat ini
    $bulanSekarang = now()->format('F');

    // Cek apakah entri untuk bulan saat ini sudah ada
    $cekEntri = SPP::where('bulan', $bulanSekarang)->exists();

    if ($cekEntri) {
        return redirect()->back()->with('error', 'Entri untuk bulan ' . $bulanSekarang . ' sudah ada.');
    }

    // Ambil semua pengguna dengan role "siswa"
    $siswa = User::where('role', 'siswa')->get();

    foreach ($siswa as $user) {
        $user->SPP()->create([
            'name' => $user->name,
            'bulan' => $bulanSekarang,
            'status' => 'Belum Bayar',
        ]);
    }

    // Redirect sesuai peran pengguna
    if (auth()->user()->role == 'admin') {
        return redirect()->route('admin.log_pembayaran')->with('success', 'Data berhasil digenerate untuk bulan ' . $bulanSekarang);
    } elseif (auth()->user()->role == 'petugas') {
        return redirect()->route('petugas.log_pembayaran')->with('success', 'Data berhasil digenerate untuk bulan ' . $bulanSekarang);
    }
}




public function destroy($id)
{

    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }

    $log = SPP::findOrFail($id);
    $log->delete();

    if ($userRole === 'admin') {
    return redirect()->route('admin.log_pembayaran')->with('success', 'Log Pembayaran has been deleted successfully.');
    }

    if ($userRole === 'petugas') {
        return redirect()->route('petugas.log_pembayaran')->with('success', 'Log Pembayaran has been deleted successfully.');
        }
  
}


}
