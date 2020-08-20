<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;
use App\Notifications\PaymentReceived;
use Illuminate\Http\Request;
use Illuminate\Queue\ListenerOptions;
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
        // request()->user()->notify(new PaymentReceived(900));


        // Eventing on product purchase
        // 1. process payment 
        // 2. unlock purchase 

        // Side Effects / Listener
        // 1. notify user about purchase
        // 2. award achievenet (badge or something)
        // 3. send sharable coupon to user at some later time


        // Lets say a user purchased a toy on your site, we can dispatch an event ProductPurchase
        // ProductPurchased::dispatch('toy');
        // OR (effectively doing the same) 
        event(new ProductPurchased('toy'));
        // then we create a listener called AwardAchievements and wire it in the EventServiceProvider.php

        // run `php artisan event:list` to see what events have which listeners


        // return redirect()->route('home');
    }
}
