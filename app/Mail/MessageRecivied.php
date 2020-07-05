<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageRecivied extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $mensaje;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($storeMessage)
    {
        $this->mensaje = $storeMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('mailContact.message_recivied');
    }
}
