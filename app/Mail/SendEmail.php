<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    public $data;
    public $toUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data = null, $toUser = null)
    {
        $this->data = $data;
        $this->toUser = $toUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.order_mail')->to('nnchi1998@gmail.com');
    }
}
