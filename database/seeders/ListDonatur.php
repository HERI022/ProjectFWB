<?php

namespace Database\Seeders;

use App\Models\Donatur;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListDonatur extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Donatur::create([
            'nama' => 'Ghazian Tza',
            'pesan' => 'Ini adalah contoh pesan!',
            'total_donasi' => 100000,
            'tipe_bayar' => 'Dana',
        ]);

        Donatur::create([
            'nama' => 'Anonim',
            'pesan' => 'Ini adalah contoh pesan!',
            'total_donasi' => 500000,
            'tipe_bayar' => 'BCA Virtual Account',
        ]);
    }
}
