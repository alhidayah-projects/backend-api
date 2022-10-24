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
            'nama_bank' => 'Mandiri',
            'nomor_rekening' => '0028511361100',
            'atas_nama' => 'Yayasan Al-Hidayah Baitul Hatim'
        ]);
        Rekening::create([
            'nama_bank' => 'BNI',
            'nomor_rekening' => '1300014491768',
            'atas_nama' => 'Yayasan Al-Hidayah Baitul Hatim'
        ]);

    }
}
