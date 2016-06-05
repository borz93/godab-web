<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function contactSendMail(ContactRequest $request)
    {

        Mail::send('frontend.emails.contact', $request->all(), function ($message) use ($request) {

            $message->from($request->get('email'), $request->get('name'));
            $message->subject($request->get('subject'));
            $message->to('borja.sanchez01@gmail.com');
        });

        return redirect('contacto')->with('succesMessage','Mensaje enviado correctamente. Le responderemos con la mayor brevedad.');
    }
}
