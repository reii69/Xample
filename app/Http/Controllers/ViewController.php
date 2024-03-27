<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SPP;
use Illuminate\Support\Facades\Hash;

class ViewController extends Controller
{
    public function index()
    {
        $userRole = auth()->user()->role;
    
        if ($userRole === 'admin') {
            $totalPendapatan = SPP::where('status', 'Sukses')->sum('nominal');
            $totalRPL = User::where('role', 'siswa')->where('jurusan', 'RPL')->count();
            $totalDPIB = User::where('jurusan', 'DPIB')->count();
            $totalTSM = User::where('jurusan', 'TSM')->count();
            $totalTAV = User::where('jurusan', 'TAV')->count();
            $totalTKR = User::where('jurusan', 'TKR')->count();
            $totalPETUGAS = User::where('role', 'petugas')->count();
            $totalADMIN = User::where('role', 'admin')->count();
            $totalSiswas = User::where('role', 'siswa')->count();
    
            return view('/dashboard', compact('totalPendapatan', 'totalPETUGAS', 'totalADMIN', 'totalRPL', 'totalDPIB', 'totalTSM', 'totalTAV', 'totalTKR', 'totalSiswas'));
        } elseif ($userRole === 'siswa') {
            $user_id = auth()->id();
            $users = SPP::where('user_id', $user_id)->paginate(5);
            $totalPendapatan = SPP::where('status', 'Sukses')->sum('nominal');
            
            return view('/dashboard', compact('users','totalPendapatan'));
        }
        elseif ($userRole === 'petugas') {
            $totalRPL = User::where('role', 'siswa')->where('jurusan', 'RPL')->count();
            $totalDPIB = User::where('jurusan', 'DPIB')->count();
            $totalTSM = User::where('jurusan', 'TSM')->count();
            $totalTAV = User::where('jurusan', 'TAV')->count();
            $totalTKR = User::where('jurusan', 'TKR')->count();
            $totalSiswas = User::where('role', 'siswa')->count();
    
            return view('/dashboard', compact('totalRPL', 'totalDPIB', 'totalTSM', 'totalTAV', 'totalTKR', 'totalSiswas'));
        }
    
        return redirect('/')->with('error', 'Unauthorized access.');
    }
    

public function index1()
{
    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }

    $users = User::where('role', 'admin')->orWhere('role', 'petugas')->paginate(5);
    return view('admin.daftar_pekerja', compact('users'));
}


public function index2()
{
    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }

    $users = User::where('role', 'siswa')->where('jurusan', 'RPL')->paginate(5);
    return view('admin.daftar_rpl', compact('users'));
}


public function index3()
{
    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }

    $users = User::where('role', 'siswa')->where('jurusan', 'DPIB')->paginate(5);
    return view('admin.daftar_dpib', compact('users'));
}

public function index4()
{
    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }

    $users = User::where('role', 'siswa')->where('jurusan', 'TSM')->paginate(5);
    return view('admin.daftar_tsm', compact('users'));
}


public function index5()
{
    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }


    $users = User::where('role', 'siswa')->where('jurusan', 'TAV')->paginate(5);
    return view('admin.daftar_tav', compact('users'));
}


public function index6()
{

    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }

    $users = User::where('role', 'siswa')->where('jurusan', 'TKR')->paginate(5);
    return view('admin.daftar_tkr', compact('users'));
}





public function index7()
{
    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }

    $users = User::where('role', 'siswa')->where('jurusan', 'RPL')->paginate(5);
    return view('petugas.daftar_rpl', compact('users'));
}


public function index8()
{
    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }

    $users = User::where('role', 'siswa')->where('jurusan', 'DPIB')->paginate(5);
    return view('petugas.daftar_dpib', compact('users'));
}

public function index9()
{
    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }

    $users = User::where('role', 'siswa')->where('jurusan', 'TSM')->paginate(5);
    return view('petugas.daftar_tsm', compact('users'));
}


public function index10()
{
    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }


    $users = User::where('role', 'siswa')->where('jurusan', 'TAV')->paginate(5);
    return view('petugas.daftar_tav', compact('users'));
}


public function index11()
{

    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }

    $users = User::where('role', 'siswa')->where('jurusan', 'TKR')->paginate(5);
    return view('petugas.daftar_tkr', compact('users'));
}

public function destroy(User $user)
{

   

    if ($user->role === 'petugas' && in_array($user->jurusan, ['RPL', 'DPIB', 'TSM', 'TAV', 'TKR'])) {
        $user->delete();
        return redirect()->route('admin.daftar_pekerja')->with('success', 'User berhasil dihapus.');
    } else {
        return redirect()->route('admin.daftar_pekerja')->with('error', 'Anda tidak memiliki izin untuk menghapus user ini.');
    }

    
}





public function deleteSelected(Request $request)
{
    // Mendapatkan daftar ID pengguna yang dipilih
    $selectedIds = $request->input('selected_users', []);

    // Memeriksa apakah ada user yang dipilih
    if (empty($selectedIds)) {
        return redirect()->back()->with('error', 'No user selected.');
    }

    // Menghapus pengguna yang dipilih
    User::whereIn('id', $selectedIds)->delete();

    // Mendapatkan jurusan dari URL
    $jurusan = $request->segment(2); // Mendapatkan bagian kedua dari URL

    // Redirect sesuai dengan jurusan
    switch ($jurusan) {
        case 'rpl':
        case 'dpib':
        case 'tsm':
        case 'tav':
        case 'tkr':
        case 'search': //Tambahkan 'search' sebagai case yang ingin di-redirect
            return redirect()->route('admin.daftar_' . $jurusan)->with('success', 'Selected users have been deleted successfully.');
            break;
                
        default:
            return redirect()->back()->with('error', 'Invalid department.');
    }
}




public function store(Request $request)
{

    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }

    // Validasi data input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'jurusan' => 'nullable|string|in:RPL,DPIB,TSM,TAV,TKR',
    ]);

    // Buat user baru dengan role admin
    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']);
    $user->role = 'admin';
    $user->kelas = 'X'; // Role default admin
    $user->jurusan = array_key_exists('jurusan', $validatedData) ? $validatedData['jurusan'] : null; // Set nilai jurusan menjadi null jika tidak ada nilai yang dipilih
    $user->save();

    // Redirect ke halaman setelah registrasi berhasil
    return redirect()->route('admin.daftar_pekerja')->with('success', 'Registrasi berhasil');

   

}

public function store1(Request $request)
{

    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }

    // Validasi data input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'jurusan' => 'nullable|string|in:RPL,DPIB,TSM,TAV,TKR',
    ]);

    // Buat user baru dengan role admin
    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']);
    $user->role = 'petugas';
    $user->kelas = 'X'; // Role default admin
    $user->jurusan = array_key_exists('jurusan', $validatedData) ? $validatedData['jurusan'] : null; // Set nilai jurusan menjadi null jika tidak ada nilai yang dipilih
    $user->save();

    // Redirect ke halaman setelah registrasi berhasil
    return redirect()->route('admin.daftar_pekerja')->with('success', 'Registrasi berhasil');

   
}

public function search(Request $request)
{

    $userRole = auth()->user()->role;
    
    if ($userRole === 'siswa') {
        return redirect()->route('notfound'); // Ubah 'error.page' dengan nama rute halaman error Anda
    }
    
    $keyword = $request->input('search');
    $users = User::where('role', 'siswa')
                ->where(function($query) use ($keyword) {
                    $query->where('name', 'like', '%'.$keyword.'%')
                          ->orWhere('nisn', 'like', '%'.$keyword.'%');
                })
                ->paginate(10);

    return view('search', compact('users', 'keyword'));

    
}




}
