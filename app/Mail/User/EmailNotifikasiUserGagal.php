<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailNotifikasiUserGagal extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $admin;
     public $email;
     public $permohonan;


    public function __construct($admin, $email, $permohonan)
    {
        //
        $this->admin = $admin;
        $this->email = $email;
        $this->permohonan = $permohonan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->to($this->admin->email, $this->admin->name)
        $email = $this->email;
        $permohonan =  $this->permohonan;
        // dd($this->email);
        return $this->to($this->admin->email , $this->admin->name)
                ->from(env('MAIL_FROM_ADDRESS'))
                // ->from('system@espatial.com')
                ->subject($this->email->subjek)
                ->view('senarai-email.templates.notifikasiUser', compact('email','permohonan'));
    }
}
