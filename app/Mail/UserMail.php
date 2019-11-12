<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $password, $rolesarray;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $user, $password, $rolesarray )
    {
        //
        $this->user = $user;
        $this->password = $password;
        $this->rolesarray = $rolesarray;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.user');
    }
}

