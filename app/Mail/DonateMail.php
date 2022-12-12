<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class DonateMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
     // view ('emails.donate', ['data' => $this->data]);
        return $this->subject('Proses Pengecekan Donasi - '. $this->data->donasi_id)
                    ->view('emails.check');
    }
}
