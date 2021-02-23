<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class ResetMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user_detail;
    protected $password;

    public function __construct(User $user, $password)
    {
        $this->user_detail = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user_detail;
        $password = $this->password;
        return $this->view('email',compact("user","password"));
    }
}
