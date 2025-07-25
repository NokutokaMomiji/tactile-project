<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegisteredMail extends Mailable
{
    use SerializesModels;

    public $user;
    public $post;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Nuevo Registro de Usuario')
                    ->view('emails.user_registered', ['user' => $this->user]  );
    }
}
