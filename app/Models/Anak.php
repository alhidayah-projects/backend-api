<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;
    protected $table = 'anak';
    protected $fillable = [
        'nama_anak',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nama_ibu',
        'nama_ayah',
        'status'
    ];

}
