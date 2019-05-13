<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DemoEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $demo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($name,$email,$phone,$msg)
     {
             $this->name=$name;
             $this->email=$email;
             $this->phone=$phone;
             $this->msg=$msg;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
         return $this->view('mails.demo')
             ->with([
                 'name'=>$this->name,
                 'email'=>$this->email,
                 'phone'=>$this->phone,
                 'message'=>$this->msg,
             ])
             ->subject('Новое письмо');
    }
}
