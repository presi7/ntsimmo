<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::send([], [], function ($message) use ($data) {
            $message->to(env('MAIL_FROM_ADDRESS'))
                ->subject($data['subject'])
                ->from($data['email'], $data['name'])
                ->html(
                    "Nom: {$data['name']}<br>Email: {$data['email']}<br><br>Message:<br>".nl2br(e($data['message']))
                );
        });

        return back()->with('success', 'Votre message a bien été envoyé. Nous vous répondrons rapidement.');
    }
}
