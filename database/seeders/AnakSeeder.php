<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anak;

class AnakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create anak
        Anak::create([
            'nama_anak' => 'Aulia',
            'nik' => '123456789012345',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'L',
            'nama_ibu' => 'Siti',
            'nama_ayah' => 'Budi',
            'status' => 'Yatim'
        ]);
        Anak::create([
            'nama_anak' => 'Budi',
            'nik' => '123456789012346',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'L',
            'nama_ibu' => 'Siti',
            'nama_ayah' => 'Budi',
            'status' => 'Piatu'
        ]);

        Anak::create([
            'nama_anak' => 'Caca',
            'nik' => '123456789012347',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'L',
            'nama_ibu' => 'Siti',
            'nama_ayah' => 'Budi',
            'status' => 'YP'
        ]);

        Anak::create([
            'nama_anak' => 'Dedi',
            'nik' => '123456789012348',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'L',
            'nama_ibu' => 'Siti',
            'nama_ayah' => 'Budi',
            'status' => 'TM'
        ]);
    }
}
