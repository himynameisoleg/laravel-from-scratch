<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.submit');
    }

    public function store()
    {
        // Notification::send(request()->user(), new PaymentReceived());

        // more commonly we use this:
        request()->user()->notify(new PaymentReceived());

        return redirect()->route('home');
    }
}
