<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store() {
        request()->validate(['email' => 'required|email']);

        $email = request('email');

        // Mail::raw('it works', function ($message) {
        //     $message->to(request('email'))
        //         ->subject('Hello there');
        // });

        // Mail::to(request('email'))
        //     ->send(new ContactMe('shirts'));

        Mail::to(request('email'))
            ->send(new Contact());


        return redirect('/contact')
            ->with('message', 'Email sent!');
    }
}
