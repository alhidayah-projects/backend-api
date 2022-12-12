<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\ContactMail;
  
class Contact extends Model
{
    use HasFactory;
  
    public $fillable = ['name', 'email', 'subject', 'keterangan'];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot() {
  
        parent::boot();
  
        static::created(function ($item) {
                
            $adminEmail = "mirasopie1@gmail.com";
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }

    protected $casts = [
        'updated_at' => 'datetime:d-m-Y',
        'created_at' => 'datetime:d-m-Y',
    ];
}