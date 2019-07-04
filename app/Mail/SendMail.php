<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('mail')->to("usamasaleem00@gmail.com");
        try{
            return $this->view('mail', ['name' => $request->name, 'msg' => $request->message, 'from' => $request->from])->to('usamasaleem00@gmail.com');
        }
        catch{
            
        }
    }
}
