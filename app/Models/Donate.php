<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\DonateMail;
use App\Mail\ApproveMail;
use App\Mail\RejectedMail;


class Donate extends Model
{
    use HasFactory;
    public $fillable = [
        'donasi_id',
        'jenis_donasi',
        'nominal',
        'nama',
        'alamat',
        'rekening_id',
        'telepon',
        'email',
        'keterangan',
        'status',
        'bukti_pembayaran',
    ];

    // if user input data send mail to mail user in field email
    public static function boot()
    {
        parent::boot();

        static::created(function ($item) {
            // send mail to user
            $userEmail = $item->email;
            Mail::to($userEmail)->send(new DonateMail($item));
        });

        // update status donate to approve
        static::updated(function ($item) {
            if ($item->status == 'approve') {
                // send mail to user
                $userEmail = $item->email;
                Mail::to($userEmail)->send(new ApproveMail($item));
            } else if ($item->status == 'reject') {
                // send mail to user
                $userEmail = $item->email;
                Mail::to($userEmail)->send(new RejectedMail($item));
            }
        });
    }

    protected $casts = [
        'updated_at' => 'datetime:d-m-Y',
        'created_at' => 'datetime:d-m-Y',
    ];
}
