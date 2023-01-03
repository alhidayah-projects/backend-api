<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;
    protected $table ='pengurus';
    protected $fillable = [
        'nama_pengurus', 
        'nik', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'jk', 
        'jabatan', 
        'no_telp',
        'alamat'];
    
    
    protected $casts = [
            'updated_at' => 'datetime:d-m-Y',
            'created_at' => 'datetime:d-m-Y',
    ];

}
