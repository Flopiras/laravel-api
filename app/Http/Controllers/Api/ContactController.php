<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        $data = $request->all();
        $mail =  new ContactMessageMail(
            sender: $data['email'],
            subject: $data['subject'],
            content: $data['content']
        );
        Mail::to(env('MAIL_TO_ADDRESS'))->send($mail);

        return response(204);
    }
}
