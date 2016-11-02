<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class Contacted extends Mailable
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
    public function build(Request $request)
    {

        return $this->view('emails.contact')
                    ->from($request->get('email'))
                    ->subject($request->get('subject'))
                    ->with([
                        'level' => 'success',
                        'email' => $request->get('email'),
                        'name' => $request->get('name'),
                        'text' => $request->get('message')
                    ]);


                    /*
                    ->with([
                        'level' => 'success',
                        'name' => $request->get('name'),
                        'email' => $request->get('email'),
                        'subject' => $request->get('subject'),
                        'message' => $request->get('message')
                    ]);
                    */
    }
}
