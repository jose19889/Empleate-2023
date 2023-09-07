<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobsAplly extends Mailable
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
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build(){
   $data= [
    'titulo'=>session('x'),
   ];
    return $this->subject('Correo desde la plataforma EMPLEATE-GE -EMPLEOS')->view('mails/index',$data)
    ->attach($this->data['attachment']->getRealPath(),
[
  'as'=>$this->data['attachment']->getClientOriginalName(),
  'mime'=>$this->data['attachment']->getClientMimeType(),
]);

    }
}
