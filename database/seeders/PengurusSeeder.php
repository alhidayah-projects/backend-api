<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengurus;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create pengurus
        $pengurus = Pengurus::create([
            'nama_pengurus' => 'Rizky',
            'nik' => '123456789012345',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1999-01-01',
            'jk' => 'L',
            'jabatan' => 'Ketua',
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Raya No. 1'
        ]);

        //create pengurus 2
        $pengurus = Pengurus::create([
            'nama_pengurus' => 'Siti',
            'nik' => '234567890123456',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1999-01-01',
            'jk' => 'P',
            'jabatan' => 'Sekretaris',
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Raya No. 1'
        ]);

        //create pengurus 3
        $pengurus = Pengurus::create([
            'nama_pengurus' => 'Rudi',
            'nik' => '345678901234567',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1999-01-01',
            'jk' => 'L',
            'jabatan' => 'Bendahara',
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Raya No. 1'
        ]);

        //create pengurus 4
        $pengurus = Pengurus::create([
            'nama_pengurus' => 'Rina',
            'nik' => '456789012345678',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1999-01-01',
            'jk' => 'P',
            'jabatan' => 'Anggota',
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Raya No. 1'
        ]);
    }
}
