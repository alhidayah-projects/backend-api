<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rekening;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rekening::create([
            'nama_bank' => 'BRI',
            'nomor_rekening' => '1234567890',
            'atas_nama' => 'Yayasan Al-Hidayah Baitul Hatim'
        ]);

    }
}
