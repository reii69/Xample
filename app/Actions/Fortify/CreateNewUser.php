<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'jurusan' => ['required', 'string', 'in:rpl,dpib,tsm,tav,tkr'],
            'kelas' => ['required', 'string', 'in:X,XI,XII'], // Validasi kelas
            'nisn' => ['required_if:role,siswa', 'string', 'unique:users'], // Validasi NISN hanya untuk siswa
        ])->validate();
    
        $role = $input['role'] ?? 'siswa'; // Default role
    
        $user = new User([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $role,
            'jurusan' => $role === 'siswa' ? $input['jurusan'] : null,
            'kelas' => $input['kelas'] ?? 'X', // Default kelas
            'nisn' => $role === 'siswa' ? $this->generateNisn() : null, // Set NISN hanya untuk siswa
        ]);
    
        $user->save();
    
        // Jika user adalah siswa, tambahkan data ke NamaBulanAction
        if ($role === 'siswa') {
            $user->namaBulanStatusActions()->create([
                'name' => $user->name, // Mengambil nilai 'name' dari user yang baru saja terdaftar
                'bulan' => now()->format('F'), // Format bulan menjadi nama bulan (contoh: 'March')
                'status' => 'Belum Bayar', // Menggunakan default status 'belum bayar'
                'nominal' => 250000.00 // Menggunakan nilai default Rp. 250.000,00
            ]);
        }
    
        return $user;
    }
    
    private function generateNisn(): string
    {
        $latestNisn = User::where('role', 'siswa')->max('nisn');
        if (!$latestNisn) {
            // Jika belum ada NISN sama sekali, mulai dari NISN pertama
            return '1989150301';
        }
    
        // Ambil angka di belakang NISN terakhir, tambahkan satu, dan format dengan leading zero
        $suffix = (int)substr($latestNisn, -2) + 1;
        return '19891503' . str_pad($suffix, 2, '0', STR_PAD_LEFT);
    }
    
    
    
}
