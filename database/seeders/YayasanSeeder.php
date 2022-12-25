<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Yayasan;

class YayasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create data yayasan
        Yayasan::create([
            'nama_yayasan' => 'Yayasan Al-Hidayah Baitul Hatim',
            'akte_notaris' => 'Cahya Suryana, SH (No : 3 Tanggal 07 April 2021)',
            'kemenkumham' => 'AHU-0009652.AH.01.04.Tahun 2021',
            'npwp' => '31.295.390.4.424.000',
            'sk_kota'=> 'TU.01.02/1677-Dinsos/IV/2021',
            'sk_provinsi' => '062/4120/PPKS/05/2013',
            'profil_yayasan'=> 'Yayasan adalah lembaga yang jalan untuk bidang sosial',
            'moto'=> 'moto 1',
            'visi'=> 'moto 2',
            'misi'=> 'moto 3',
            'alamat' => 'Jl. KebonJayanti No. 181/A, KebonJayanti, Kec. Kiaracondong, Bandung, Jawa Barat 40614',
            'no_telp' => '0812-3456-7890',
            'email' => 'alhidayahkircon@gmail.com',
            'instagram' => 'alhidayahkircon'
        ]);

    }
}
