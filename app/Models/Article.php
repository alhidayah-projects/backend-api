<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'title',
        'desc',
        'image',
        //'slug',
    ];

    protected $casts = [
        'updated_at' => 'datetime:d-m-Y',
        'created_at' => 'datetime:d-m-Y',
    ];

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
