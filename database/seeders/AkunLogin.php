<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunLogin extends Seeder
{
    public function run(): void
    {
        // Untuk bisa mengakses dashboard, set jenisAkun ke 'admin'
        DB::table('users')->insert([
            'jenisAkun' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin123')
        ]);

        // Untuk sebagai user biasa, set jenisAkun ke 'guest'
        DB::table('users')->insert([
            'jenisAkun' => 'guest',
            'username' => 'akuntamu',
            'password' => Hash::make('tamu123')
        ]);
    }
}
