<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class subMail extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    private $sub;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $sub)
    {
        $this->user = $user;
        $this->sub = $sub;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contact@easytocop.fr')->subject('Abonnement' . $this->sub->name)->view('email.subMail', ['user' => $this->user, 'sub' => $this->sub]);
    }
}
