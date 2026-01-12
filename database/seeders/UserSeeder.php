<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */
        $admin = User::create([
            'name' => 'Admin Absensi',
            'email' => 'admin@absensi.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        /*
        |--------------------------------------------------------------------------
        | GURU
        |--------------------------------------------------------------------------
        */
        $guruUser = User::create([
            'name' => 'Guru Satu',
            'email' => 'guru@absensi.test',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        Guru::create([
            'user_id' => $guruUser->id,
            'nip' => '1987654321',
            'nama' => 'Guru Satu',
            'jenis_kelamin' => 'L',
            'alamat' => 'Mojokerto',
            'no_hp' => '08123456789',
        ]);
    }
}
