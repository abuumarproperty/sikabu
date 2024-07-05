<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact', [
            'title' => 'Abu Umar Property - Contact',
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|max:255',
            'body' => 'required|max:255',
        ]);

        Mail::send(
            'email',
            $validated,
            function ($message) {
                $message->from('riwanda1910@gmail.com');
                $message->to('didiriwanda02@gmail.com', 'Didi Riwanda')
                    ->subject('Your Website Contact Form');
            }
        );

        return back()->with('success', 'Thanks for contacting me, I will get back to you soon!');
    }
}
