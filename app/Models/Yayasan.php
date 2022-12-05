<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yayasan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_yayasan',
        'akte_notaris',
        'kemenkumham',
        'npwp',
        'sk_kota',
        'sk_provinsi',
        'profil_yayasan',
    ];
    
}
